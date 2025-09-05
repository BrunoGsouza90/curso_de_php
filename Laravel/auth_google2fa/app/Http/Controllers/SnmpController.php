<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnmpController extends Controller{
    
    public function index(Request $request){

        $OID = "1.3.6.1.2.1.2.2.1.10.2";

        $type_response = $request->filter;

        return view('SNMP.index', compact('OID', 'type_response'));

    }

}