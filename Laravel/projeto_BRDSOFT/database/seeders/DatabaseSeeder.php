<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder{

    public function run(): void{

        $password = Str::password();

        User::factory()->create([

            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => $password,
            'login' => 'admin',
            'status' => 'Ativo',
            'did' => '00', 
            'is_admin' => 'Sim'

        ]);

        $this->call([

        	PermissionSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            PermissionUser::class

    	]);

        echo "A senha do Admin é: " . $password . "\n";

    }

}