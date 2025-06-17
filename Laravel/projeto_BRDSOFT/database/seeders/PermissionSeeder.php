<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder{

    public function run(): void{

        $permissions = [

            'create_users' => 'Criar usuários',
            'edit_users' => 'Editar usuários',
            'destroy_users' => 'Deletar usuários',
            'pdf_generate' => 'Gerar PDF',
            'csv_generate' => 'Gerar CSV',
            'view_audit' => 'Visualizar auditoria',
            'view_users' => 'Visualizar usuários',
            'edit_acount' => 'Editar a própria conta',
            'destroy_acount' => 'Deletar a própria conta',
            'manipulate_permissions' => 'Manipular permissões',
            'view_admins' => 'Visualizar administradores',
            'create_admins' => 'Criar administradores',
            'edit_admins' => 'Editar administradores',
            'destroy_admins' => 'Deletar administradore',
            'view_report' => 'Visualizar relatório',
            'create_dids' => 'Criar DIDS',
            'edit_dids' => 'Editar DIDS',
            'destroy_dids' => 'Deletar DIDS',
            'create_extesions' => 'Criar ramais',
            'edit_extesions' => 'Editar ramais',
            'destroy_extesions' => 'Deletar ramais',
            'view_dids' => 'Visualizar DIDS',
            'view_extesions' => 'Visualizar ramais'

        ];

        foreach ($permissions as $name => $description){

            Permission::firstOrCreate(
                
                [

                'name' => $name

                ], 
            
                [

                'description' => $description

                ]
            
            );

        }

    }

}