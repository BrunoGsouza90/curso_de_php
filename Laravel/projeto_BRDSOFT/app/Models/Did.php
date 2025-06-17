<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Did extends Model{
    
    protected $fillable = [

        'number',
        'description',
        'user_id'

    ];

    // ====================================================

    public function store_did($data){

        $info = $this->create([

            'number' => $data['number'],
            'description' => $data['description'],
            'user_id' => Auth::id(),

        ]);

        return $info;

    }

    public function update_did($data){

        $info = $this->update($data);

        return $info;

    }

    public function destroy_did(){

        $info = $this->delete();

        return $info;

    }

}