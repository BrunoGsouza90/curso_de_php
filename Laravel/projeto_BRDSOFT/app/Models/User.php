<?php

namespace App\Models;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Audit;
use App\Models\Did;
use App\Models\Extension;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable{
    
    use HasApiTokens ,HasFactory, Notifiable;

    protected $fillable = [

        'name',
        'email',
        'password',
        'login',
        'status',
        'state',
        'city',
        'document',
        'telephone',
        'is_admin',
        'country',
        'did'
        
    ];


    protected $hidden = [

        'password',
        'remember_token',

    ];

    protected function casts(): array{

        return [

            'email_verified_at' => 'datetime',
            'password' => 'hashed',

        ];

    }

    // ====================================================

    public function store_user($data){

        $info = $this->create([

            'name' => $data['name'],
            'email' => $data['email'],
            'login' => $data['login'],
            'document' => $data['document'],
            'state' => $data['state'],
            'city' => $data['city'],
            'country' => $data['country'],
            'did' => $data['did'],
            'status' => $data['status'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
            'is_admin' => 'Não'

        ]);

        return $info;

    }

    public function store_role_user($id){

        $info = $this->find($id)->roles()->attach(2);

        return true;

    }

    public function store_permission_users($id){

        User::find($id)->permission()->attach(8);

        return true;

    }

    public function update_user($data){

        $info = $this->update($data);

        return $info;

    }

    public function destroy_user(){

        $info = $this->update([

            'status' => 'Inativo'

        ]);

        return $info;

    }

    public function reactivate_user(){

        $info = $this->update([

            'status' => 'Ativo'

        ]);

        return $info;

    }

    // ====================================================

    public function store_admin($data){

        $info = $this->create([

            'name' => $data['name'],
            'email' => $data['email'],
            'login' => $data['login'],
            'document' => $data['document'],
            'state' => $data['state'],
            'city' => $data['city'],
            'country' => $data['country'],
            'did' => $data['did'],
            'status' => $data['status'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
            'is_admin' => 'Sim'

        ]);

        return $info;

    }

    public function store_role_admin($id){

        $this->find($id)->roles()->attach(1);

        return true;

    }

    public function store_permission_admin($id){

        for($i = 1; $i <= 14; $i++){

            User::find($id)->permission()->attach($i);

        }

        return true;

    }

    public function update_admin($data){

        $info = $this->update($data);

        return $info;

    }

    public function destroy_admin(){

        $info = $this->update([

            'status' => 'Inativo'

        ]);

        return $info;

    }

    public function reactivate_admin(){

        $info = $this->update([

            'status' => 'Ativo'

        ]);

        return $info;

    }

    // ====================================================

    public function add_token($token){

        $info = $this->token = $token;

        $this->save();

        return $info;

    }

    // ====================================================

    public function user(){

        return $this->belongsToMany(User::class);

    }

    public function roles(){

        return $this->belongsToMany(Role::class);

    }

    public function audit(){

        return $this->hasMany(Audit::class);

    }

    public function permission(){

        return $this->belongsToMany(Permission::class);

    }

    public function did(){

        return $this->hasMany(Did::class);

    }

    public function extesion(){

        return $this->hasMany(Extension::class);

    }

    public function token(){

        return $this->hasMany(Token::class);

    }

}