<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model{

    protected $fillable = [

        'name',
        'description',
        'user_id'

    ];

    public function user(){

        return $this->belongsToMany(User::class);

    }
    
}