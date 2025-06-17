<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller{
 
    public function permission(Request $request){

        $user = User::find($request->id);

        $user->load('permission');
        
        $permissions_user = [];

        $permissions = Permission::all();

        $permission_user = [];

        foreach($permissions as $permission){

            $permissions_obj[$permission->description] = $permission->name;

        }

        foreach($user->permission as $permission){

            $permissions_user[] = $permission->name;

        }

        $count = 1;

        return view('permission.index', compact('user', 'permissions_user', 'permissions_obj', 'count'));

    }

    public function update_permission(Request $request ,$id){

        $request = $request->all();

        $user = User::find($id);

        $user->load('permission');             

        for($i = 1; $i <= 23; $i++){

            User::find($id)->permission()->detach($i);

        }

        $names = [
            'create_users', 'edit_users', 'destroy_users', 'pdf_generate', 'csv_generate', 
            'view_audit', 'view_users', 'edit_acount', 'destroy_acount', 'manipulate_permissions', 
            'view_admins', 'create_admins', 'edit_admins', 'destroy_admins', 'view_report', 'create_dids', 'edit_dids', 'destroy_dids', 'create_extesions', 'edit_extesions', 'destroy_extesions', 'view_dids', 'view_extesions'
        ];
        
        foreach ($names as $key => $name){

            if ($request[$name] == 'Sim'){

                User::find($id)->permission()->attach($key + 1);

            }

        }

        if($request['is_admin'] == 'Sim'){

            return redirect(route('admins.index'))->with('success', "Permissões do usuário $user->name alteradas com sucesso!");

        } else {

            return redirect(route('users.index'))->with('success', "Permissões do usuário $user->name alteradas com sucesso!");

        }

    }

}