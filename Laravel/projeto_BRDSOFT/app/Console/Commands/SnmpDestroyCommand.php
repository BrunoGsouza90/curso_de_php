<?php

namespace App\Console\Commands;

use App\Models\Oidoctet;
use App\Models\Oidsnmp;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Ndum\Laravel\Snmp;

class SnmpDestroyCommand extends Command{

    protected $signature = 'app:snmp-destroy-command';

    protected $description = 'Aqui estamos zerando o Banco de Dados a meia-noite.';

    public function handle(){

        $SNMP_request = new Snmp();
        $SNMP_request->newClient("168.121.7.23", 2 ,"quicksip");

        $snmp_manipulate = new Oidsnmp();

        $response_snmp = $snmp_manipulate->destroy_snmp();

        $snmp_manipulate = new Oidoctet();

        $response_snmp = $snmp_manipulate->destroy_snmp_octets();

        // ====================================================

        if(!$response_snmp){

            Log::info('Erro ao usar o schedule!');

        }
        
    }

}