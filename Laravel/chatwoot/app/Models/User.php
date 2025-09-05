<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable {

    use HasFactory, Notifiable;

    protected $fillable = [

        'name',
        'email',
        'password',

    ];

    protected $hidden = [

        'password',
        'remember_token',

    ];

    protected function casts(): array {

        return [

            'email_verified_at' => 'datetime',
            'password' => 'hashed',

        ];

    }

    public function registrarUsuario($data) {

        $this->create([

            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"])

       ]);

    }

}