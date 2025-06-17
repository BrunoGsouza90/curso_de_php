<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{

    public function register(): void{
        


    }

    public function boot(): void{

        $names_permissions = ['create_users', 'edit_users', 'destroy_users', 'pdf_generate', 'csv_generate', 'view_audit', 'view_users', 'edit_acount', 'destroy_acount', 'manipulate_permissions', 'view_admins' ,'create_admins', 'edit_admins', 'destroy_admins', 'view_report', 'create_dids', 'edit_dids', 'destroy_dids', 'create_extesions', 'edit_extesions', 'destroy_extesions', 'view_dids', 'view_extesions'];

        foreach($names_permissions as $name_permission){

            Gate::define("can-$name_permission", function() use ($name_permission){

                $auth = Auth::user();
    
                $auth->load('permission');
        
                $permissions = [];
        
                foreach($auth->permission as $permission){
        
                    $permissions[] = $permission->name;
        
                }
    
                if(!in_array($name_permission, $permissions)){
    
                    return false;
    
                } else {
    
                    return true;
    
                }
    
            });

        }

    }

}