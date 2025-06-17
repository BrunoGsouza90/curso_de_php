<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Oidoctet;
use App\Models\Oidsnmp;

class SnmpController extends Controller{

    public function index($id){

        // Gráfico Line - Octets.
        // Inicialização dos campos.
        for($i = 0; $i < 24; $i++){

            $number = strlen($i) == 1 ? "0$i" : "$i";

            $labels[] = "$number:00";

        }

        for($i = 0; $i < 24; $i++){

            $number = strlen($i) == 1 ? "0$i" : "$i";

            $horas[] = $number;

        }
        
        $date_today = date('Y-m-d');

        // Prenchimento dos dados.
        for($i = 0; $i < 24; $i++){

            $number_first = intval(strlen($i) == 1 ? "0$i" : $i);

            $number_last = intval($number_first) + 1;

            $dados[$number_first] = empty(Oidoctet::where('created_at', '>', "$date_today $number_first:00:00")
            ->where('created_at', '<', "$date_today $number_last:00:00")
            ->first()->value) ? null : Oidoctet::where('created_at', '>', "$date_today $number_first:00:00")
            ->where('created_at', '<', "$date_today $number_last:00:00")
            ->first()->value;

        }

        // Manipulação dos Dados em tempo real.
        $current_time = intval(date('H'));
        
        $date_now = now();

        $Oidoctet_new = Oidoctet::where('created_at', '=', $date_now)->first();

        if(!empty($Oidoctet_new)){

            $dados[$current_time] = $Oidoctet_new->value;

        }

        $SNMP_OID = Oidoctet::orderBy('created_at', 'DESC')->first();

        $OID = $SNMP_OID->value;

        // Graphic Pizza - CPU.

        $SNMP_cpu = Oidsnmp::where('type', '=', 'CPU')->first()->value;

        // Graphic Pizza - Memória SWAP.

        $SNMP_swap_total = Oidsnmp::where('type', '=', 'swap')->first();

        $SNMP_swap_disponivel = Oidsnmp::where('type', '=', 'swap_d')->first();

        // Graphic Pizza - Memória Física.

        $SNMP_fisica_total = Oidsnmp::where('type', '=', 'fisica')->first();

        $SNMP_fisica_disponivel = Oidsnmp::where('type', '=', 'fisica_d')->first();

        $SNMP_fisica_uso = Oidsnmp::where('type', '=', 'fisica_u')->first();

        // Graphic Opensips.
        $SNMP_opensips = Oidsnmp::where('type', '=', 'opensips')->first()->value == "1" ? 'UP' : 'DOWN';

        // Graphic FTP Engine.
        $SNMP_rtpengine = Oidsnmp::where('type', '=', 'rtpengine')->first()->value == "1" ? 'UP' : 'DOWN';

        // Caso não haja dados.
        if(empty($SNMP_OID)){

            // Resposta JSON na API.
            return response()->json([

                'OID_octets' => $OID,
                'OID_octets_min' => 0,
                'OID_octets_max' => 0,
                'labels_octets' => [],
                'datas_octets' => [],
                'msg_octets' => 'Não a dados na API',
                'value_CPU' => $SNMP_cpu,
                'swap_total' => $SNMP_swap_total,
                'swap_disponivel' => $SNMP_swap_disponivel,
                'fisica_total' => $SNMP_fisica_total,
                'fisica_disponivel' => $SNMP_fisica_disponivel,
                'fisica_uso' => $SNMP_fisica_uso,
                'opensips' => $SNMP_opensips,
                'rtpengine' => $SNMP_rtpengine
    
            ]);

        };

        // Manipulação do eixo Y.
        $tamanho = strlen($OID);

        $numero_inicial = $OID[0] - 1;

        $numero_final = $OID[0] + 1;

        $zeros = str_repeat(0, $tamanho - 1);

        $OID_MIN = "$numero_inicial$zeros";

        $OID_MAX = "$numero_final$zeros";

        // Caso a busca seja pelo horário atual.
        if($id == 1){

            // Manipulação do eixo X.
            $counter = $current_time + 2;

            while($counter < 24){

                unset($dados[$counter]);

                unset($labels[$counter]);

                $counter++;

            }

            $dados = array_values($dados);

            $labels = array_values($labels);

            // Resposta JSON na API.
            return response()->json([

                'OID_octets' => $OID,
                'OID_octets_min' => $OID_MIN,
                'OID_octets_max' => $OID_MAX,
                'labels_octets' => $labels,
                'datas_octets' => $dados,
                'msg_octets' => '',
                'value_CPU' => $SNMP_cpu,
                'swap_total' => $SNMP_swap_total,
                'swap_disponivel' => $SNMP_swap_disponivel,
                'fisica_total' => $SNMP_fisica_total,
                'fisica_disponivel' => $SNMP_fisica_disponivel,
                'fisica_uso' => $SNMP_fisica_uso,
                'opensips' => $SNMP_opensips,
                'rtpengine' => $SNMP_rtpengine
    
            ]);

        }

        // Resposta JSON na API.
        return response()->json([

            'OID_octets' => $OID,
            'OID_octets_min' => $OID_MIN,
            'OID_octets_max' => $OID_MAX,
            'labels_octets' => $labels,
            'datas_octets' => $dados,
            'msg_octets' => '',
            'value_CPU' => $SNMP_cpu,
            'swap_total' => $SNMP_swap_total,
            'swap_disponivel' => $SNMP_swap_disponivel,
            'fisica_total' => $SNMP_fisica_total,
            'fisica_disponivel' => $SNMP_fisica_disponivel,
            'fisica_uso' => $SNMP_fisica_uso,
            'opensips' => $SNMP_opensips,
            'rtpengine' => $SNMP_rtpengine

        ]);

    }

}