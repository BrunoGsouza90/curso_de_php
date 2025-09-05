<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oidoctet extends Model{
    
    protected $fillable = [

        'OID',
        'value',
        'type'

    ];

    // ====================================================

    public function store_snmp_octets($data){

        $info = $this->create([

            'OID' => $data['OID'],
            'value' => $data['value'],
            'type' => $data['type'],

        ]);

        return $info;

    }

    public function destroy_snmp_octets(){

        $info = $this->truncate();

        return $info;

    }

}