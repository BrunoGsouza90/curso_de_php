<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class UserController extends Controller{

    public function index(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-view_users')){

            abort(403);
            
        }

        $auth->load('permission');

        $users = User::where('name', '<>', 'Admin')
        ->where('is_admin', '=', 'Não')->get();

        return view('user.index',compact('users', 'auth'));

    }

    public function search(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $users = User::where('name', '<>', 'Admin')
        ->where('is_admin', '=', 'Não')
        ->whereAny([
            'name',
            'login',
            'email'
        ], 'like', "$request->search_users%")->get();

        return view('user.index', compact('users', 'auth'));

    }

    public function show(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $user = User::find($request->id);
    
        return view('user.show', compact('user', 'auth'));

    }

    public function create(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-create_users')){

            abort(403);
            
        }

        return view('user.create', compact('auth'));

    }

    public function store(UserStoreRequest $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-create_users')){

            abort(403);
            
        }

        $data = $request->all();

        $user = new User();

        $data['ip'] = $request->ip();

        $response_user = $user->store_user($data);

        if(!$response_user){
            
            return redirect(route('admins.index'))->with('error', 'Erro ao criar usuario!');

        }

        $user = User::orderBy('id', 'DESC')->first();

        $user_before = $user->toArray();

        $response_user = $user->store_role_user($user->id);

        if(!$response_user){
            
            return redirect(route('users.index'))->with('error', 'Erro ao definir o cargo!');

        }

        $response_user = $user->store_permission_users($user->id);

        if(!$response_user){
            
            return redirect(route('users.index'))->with('error', 'Erro ao definir permissões do usuário!');

        }

        $audit = new Audit();

        $response_audit = $audit->store_audit($data, 'create', 'users', $user_before, Auth::id(),'WEB');

        if(!$response_audit){

            file_put_contents(storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" . date('d/m/Y H:i:s') . "\n", FILE_APPEND);            

        }

        return redirect(route('users.index'))->with('success', 'Usuário registrado com sucesso!');

    }

    public function edit(Request $request ,$id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $user = User::find($id);

        return view('user.edit', compact('user', 'auth'));

    }

    public function update(UserUpdateRequest $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-edit_users')){

            abort(403);
            
        }

        $data = $request->all();

        $user = User::find($id);

        $user_before = User::find($id);

        if(!$user){

            return redirect(route('users.index'))->with('error', 'Esse usuário não está cadastrado!');

        }

        $response_user = $user->update_user($data);

        if(!$response_user){

            return redirect(route('users.index'))->with('error', 'Erro ao atualizar usuário!');

        }

        $user_after = User::find($id);

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->edit_audit($data, 'update', 'users', $user_before, $user_after, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return redirect(route('users.index'))->with('success', 'Usuário atualizado com sucesso!');

    }

    public function destroy(Request $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-destroy_users')){

            abort(403);
            
        }

        $user = User::find($id);

        $user_after = User::find($id);

        $response_user = $user->destroy_user();

        if(!$response_user){

            return redirect(route('users.index'))->with('error', 'Erro ao deletar usuário!'); 

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'users', $user_after, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return redirect(route('users.index'))->with('success', 'Usuário deletado com sucesso!');

    }

    public function reactivate(Request $request, $id){

        $user = User::find($id);

        $user_after = User::find($id);

        $response_user = $user->reactivate_user();

        if(!$response_user){

            return redirect(route('users.index'))->with('error', 'Erro ao reativar usuário!'); 

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'users', $user_after, Auth::id(), 'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return redirect(route('users.index'))->with('success', 'Usuário reativar com sucesso!');

    }

}