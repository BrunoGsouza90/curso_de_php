<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oidsnmp extends Model{
 
    protected $fillable = [

        'OID',
        'value',
        'type'

    ];

    // ====================================================

    public function store_snmp($data){

        $info = $this->create([

            'OID' => $data['OID'],
            'value' => $data['value'],
            'type' => $data['type'],

        ]);

        return $info;

    }

    public function update_snmp($data){

        $info = $this->where('type', '=', $data['type'])
        ->update([

            'OID' => $data['OID'],
            'value' => $data['value'],
            'type' => $data['type'],

        ]);
        
        return $info;

    }

    public function destroy_snmp(){

        $info = $this->truncate();

        return $info;

    }
    
}