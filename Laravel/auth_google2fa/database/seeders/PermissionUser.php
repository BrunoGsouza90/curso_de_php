<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionUser extends Seeder{

    public function run(): void{

        $user = User::find(1);
        
        for($i = 1; $i <= 23; $i++){

            if($i != 9){

                $permissions[] = $i;

            }

        }

        $user->permission()->syncWithoutDetaching($permissions);

    }

}