<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtensionUpdateRequest;
use App\Http\Requests\ExtesionStoreRequest;
use App\Models\Audit;
use App\Models\Extension;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ExtesionController extends Controller{
    
    public function index(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-view_extesions')){

            abort(403);
            
        }

        $users = User::join('extensions', 'users.id', '=', 'extensions.user_id')->get();

        return view('extesion.index', compact('users', 'auth'));

    }

    public function search(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(empty($request->search_extesions)){

            $users = User::join('extensions', 'users.id', '=', 'extensions.user_id')->get();

            return view('extesion.index', compact('users', 'auth'));

        }

        $users = User::where('extensions.id', '=', $request->search_extesions)
        ->join('extensions', 'users.id', '=', 'extensions.user_id')
        ->Orwhere('extesion', '=', $request->search_extesions)->get();

        return view('extesion.index', compact('users', 'auth'));

    }

    public function show(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $extesion = Extension::find($request->id);

        $user = User::where('id', '=', $extesion->user_id)->first();
    
        return view('extesion.show', compact('extesion', 'auth', 'user'));

    }

    public function create(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-create_extesions')){

            abort(403);
            
        }

        return view('extesion.create', compact('auth'));

    }

    public function store(ExtesionStoreRequest $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-create_extesions')){

            abort(403);
            
        }

        $data = $request->all();

        $extesion = new Extension();

        $data['ip'] = $request->ip();

        $response_extesion = $extesion->store_extesion($data, 'WEB');

        if(!$response_extesion){
            
            return redirect(route('extesions.index'))->with('error', 'Erro ao criar o Ramal!');

        }

        $extesion = Extension::orderBy('id', 'DESC')->first();

        $extesion_before = $extesion->toArray();

        $audit = new Audit();

        $response_audit = $audit->store_audit($data, 'create', 'extesions', $extesion_before, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return redirect(route('extesions.index'))->with('success', 'Ramal registrado com sucesso!');

    }

    public function edit(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-edit_extesions')){

            abort(403);
            
        }

        $extesion = Extension::find($request->id);

        return view('extesion.edit', compact('extesion', 'auth'));

    }

    public function update(ExtensionUpdateRequest $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-edit_extesions')){

            abort(403);
            
        }

        $data = $request->all();

        $data['type'] = 'WEB';

        $extesion = Extension::find($id);

        $extesion_before = Extension::find($id);

        $response_extesion = $extesion->update_extesion($data);

        if(!$response_extesion){

            return redirect(route('extesions.index'))->with('error', 'Erro ao atualizar o Ramal!');

        }

        $extesion_after = Extension::find($id);

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->edit_audit($data, 'update', 'extesions', $extesion_before, $extesion_after, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return redirect(route('extesions.index'))->with('success', 'Ramal atualizado com sucesso!');

    }

    public function destroy(Request $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-destroy_extesions')){

            abort(403);
            
        }

        $extesion = Extension::find($id);

        $extesion_after = User::find($id);

        $response_extesion = $extesion->destroy_user();

        if(!$response_extesion){

            return redirect(route('extesions.index'))->with('error', 'Erro ao deletar o ramal!'); 

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'extensions', $extesion_after, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return redirect(route('admins.index'))->with('success', 'Ramal deletado com sucesso!');       

    }

}