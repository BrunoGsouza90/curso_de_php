<?php

namespace App\Http\Controllers;

use App\Http\Requests\DidStoreRequest;
use App\Http\Requests\DidUpdateRequest;
use App\Models\Audit;
use App\Models\Did;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class DidController extends Controller{
    
    public function index(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-view_dids')){

            abort(403);
            
        }

        $dids = Did::all();

        return view('did.index', compact('dids', 'auth'));

    }

    public function search(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(empty($request->search_dids)){

            $dids = Did::all();

            return view('did.index', compact('dids', 'auth'));

        }

        $dids = Did::where('id', '=', $request->search_dids)
        ->Orwhere('number', '=', $request->search_dids)->get();

        return view('did.index', compact('dids', 'auth'));

    }

    public function show(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $did = Did::find($request->id);

        $user = User::where('id', '=', $did->user_id)->first();
    
        return view('did.show', compact('did', 'auth', 'user'));

    }

    public function create(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-create_dids')){

            abort(403);
            
        }

        return view('did.create', compact('auth'));

    }

    public function store(DidStoreRequest $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-create_dids')){

            abort(403);
            
        }

        $data = $request->all();

        $did = new Did();

        $data['ip'] = $request->ip();

        $response_did = $did->store_did($data);

        if(!$response_did){
            
            return redirect(route('dids.index'))->with('error', 'Erro ao criar o DID!');

        }

        $audit = new Audit();

        $did = Did::orderBy('id', 'DESC')->first();

        $did_before = $did->toArray();

        $response_audit = $audit->store_audit($data, 'create', 'dids', $did_before, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return redirect(route('dids.index'))->with('success', 'DID registrado com sucesso!');

    }

    public function edit(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-edit_dids')){

            abort(403);
            
        }

        $did = Did::find($request->id);

        return view('did.edit', compact('did', 'auth'));

    }

    public function update(DidUpdateRequest $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-edit_dids')){

            abort(403);
            
        }

        $data = $request->all();

        $did = Did::find($id);

        $did_before = Did::find($id);

        $response_did = $did->update_did($data);

        if(!$response_did){

            return redirect(route('dids.index'))->with('error', 'Erro ao atualizar o DID!');

        }

        $did_after = Did::find($id);

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->edit_audit($data, 'update', 'dids', $did_before, $did_after, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return redirect(route('dids.index'))->with('success', 'DID atualizado com sucesso!');

    }

    public function destroy(Request $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-destroy_dids')){

            abort(403);
            
        }

        $did = User::find($id);

        $did_after = User::find($id);

        $response_did = $did->destroy_user();

        if(!$response_did){

            return redirect(route('users.index'))->with('error', 'Erro ao deletar o DID!'); 

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'dids', $did_after, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return redirect(route('admins.index'))->with('success', 'DID deletado com sucesso!');       

    }

}