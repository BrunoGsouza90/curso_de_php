<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Audit extends Model{
    
    protected $fillable = [

        'action',
        'table',
        'ip',
        'user_id',
        'date_before',
        'date_after',
        'server'

    ];

    protected $casts = [

        'date_before' => 'array',
        'date_after' => 'array'

    ];

    // ====================================================

    public function store_audit($data, $action, $table, $user_before, $user_id, $server){

        Audit::create([

            'action' => $action,
            'table' => $table,
            'ip' => $data['ip'],
            'user_id' => $user_id,
            'date_before' => $user_before,
            'server' => $server

        ]);

        return true;

    }

    public function edit_audit($data, $action, $table, $user_before, $user_after, $user_id, $server){

        Audit::create([

            'action' => $action,
            'table' => $table,
            'ip' => $data['ip'],
            'user_id' => $user_id,
            'date_before' => $user_before,
            'date_after' => $user_after,
            'server' => $server

        ]);

        return true;

    }

    public function destroy_audit($data, $action, $table, $user_after, $user_id,$server){

        Audit::create([

            'action' => $action,
            'table' => $table,
            'ip' => $data['ip'],
            'user_id' => $user_id,
            'date_after' => $user_after,
            'server' => $server

        ]);

        return true;

    }

    public function login_audit($ip, $action, $table, $server, $user_id, $response){

        Audit::create([

            'action' => $action,
            'table' => $table,
            'ip' => $ip,
            'user_id' => $user_id,
            'server' => $server,
            'date_before' => $response

        ]);

        return true;

    }

    public function logout_audit($ip, $action, $table, $user_id, $server){

        Audit::create([

            'action' => $action,
            'table' => $table,
            'ip' => $ip,
            'user_id' => $user_id,
            'server' => $server,

        ]);

        return true;

    }

}