<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller{
 
    public function index(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $admins = User::where('is_admin', '=', 'Sim')->get();

        return view('admin.index', compact('admins', 'auth'));

    }

    public function search(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $admins = User::where('is_admin', '=', 'Sim')
        ->whereAny([
            'id',
            'name',
            'login',
            'email'
        ], 'like', "$request->search_admins%")->get();

        return view('admin.index', compact('admins', 'auth'));

    }

    public function show(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $admin = User::find($request->id);
    
        return view('admin.show', compact('admin', 'auth'));

    }

    public function create(){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        return view('admin.create', compact('auth'));

    }

    public function store(AdminStoreRequest $request){

        dd($request->all());

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $data = $request->all();

        $admin = new User();

        $data['ip'] = $request->ip();

        $response_admin = $admin->store_admin($data);

        if(!$response_admin){
            
            return redirect(route('admins.index'))->with('error', 'Erro ao criar administrador!');

        }

        $admin = User::orderBy('id', 'DESC')->first();

        $admin_before = $admin->toArray();

        $response_admin = $admin->store_role_admin($admin->id);

        if(!$response_admin){
            
            return redirect(route('admins.index'))->with('error', 'Erro ao definir o cargo!');

        }

        $response_admin = $admin->store_permission_admin($admin->id);

        if(!$response_admin){
            
            return redirect(route('admins.index'))->with('error', 'Erro ao definir permissões de administrador!');

        }

        $audit = new Audit();

        $response_audit = $audit->store_audit($data, 'create', 'users', $admin_before, Auth::id(),'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return redirect(route('admins.index'))->with('success', 'Administrador registrado com sucesso!');

    }

    public function edit(Request $request){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $admin = User::find($request->id);

        return view('admin.edit', compact('admin', 'auth'));

    }

    public function update(AdminUpdateRequest $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        $data = $request->all();

        $admin = User::find($id);

        $admin_before = User::find($id);

        if(!$admin){

            return redirect(route('admins.index'))->with('error', 'Esse administrador não está cadastrado!');

        }

        $response_admin = $admin->update_admin($data);

        if(!$response_admin){

            return redirect(route('admins.index'))->with('error', 'Erro ao atualizar administrador!');

        }

        $admin_after = User::find($id);

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->edit_audit($data, 'update', 'users', $admin_before, $admin_after, Auth::id(),'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }

        return redirect(route('admins.index'))->with('success', 'Administrador atualizado com sucesso!');

    }

    public function destroy(Request $request, $id){

        if(Session::get('impersonate') == 'impersonate'){

            $user_id = Session::get('user_id');

            $auth = Auth::onceUsingId($user_id);

        } else {

            $auth = Auth::user();

        }

        if(!Gate::forUser($auth->name)->allows('can-destroy_admins')){

            abort(403);
            
        }

        $admin = User::find($id);

        $admin_after = User::find($id);

        $response_admin = $admin->destroy_user();

        if(!$response_admin){

            return redirect(route('users.index'))->with('error', 'Erro ao deletar Administrador!'); 

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'users', $admin_after, Auth::id(),'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return redirect(route('admins.index'))->with('success', 'Administrador deletado com sucesso!');       

    }

    public function reactivate(Request $request, $id){

        $admin = User::find($id);

        $admin_after = User::find($id);

        $response_admin = $admin->reactivate_user();

        if(!$response_admin){

            return redirect(route('users.index'))->with('error', 'Erro ao reativar Administrador!'); 

        }

        $audit = new Audit();

        $data['ip'] = $request->ip();

        $response_audit = $audit->destroy_audit($data, 'destroy', 'users', $admin_after, Auth::id(),'WEB');

        if(!$response_audit){

            file_put_contents( storage_path('/logs/audit.log'), "Erro ao criar a auditoria \n" .  date('d/m/Y h:m:s') . "\n", FILE_APPEND);

        }
        
        return redirect(route('admins.index'))->with('success', 'Administrador reativado com sucesso!');       

    }

}