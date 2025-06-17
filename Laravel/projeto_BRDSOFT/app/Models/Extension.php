<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Extension extends Model{
    
    protected $fillable = [

        'extesion',
        'name_ramal',
        'type',
        'callerid',
        'user_id'

    ];

    // ====================================================

    public function store_extesion($data, $type){

        $info = $this->create([

            'extesion' => $data['extesion'],
            'name_ramal' => $data['name_ramal'],
            'type' => $type,
            'callerid' => $data['callerid'],
            'user_id' => Auth::id(),

        ]);

        return $info;

    }

    public function update_extesion($data){

        $info = $this->update($data);

        return $info;

    }

    public function destroy_extesion(){

        $info = $this->delete();

        return $info;

    }

}