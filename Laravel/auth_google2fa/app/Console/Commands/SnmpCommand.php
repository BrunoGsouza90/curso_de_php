<?php

namespace App\Console\Commands;

use App\Models\Oidoctet;
use App\Models\Oidsnmp;
use Illuminate\Console\Command;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Ndum\Laravel\Snmp;

class SnmpCommand extends Command{

    protected $signature = 'app:snmp-command';

    protected $description = 'Aqui estamos alimentando o banco com os valores do OID SNMP.';

    public function handle(){

        try{

            $SNMP_request = new Snmp();
            $SNMP_request->newClient("168.121.7.23", 2 ,"quicksip");

            echo "\nSNMP Instanciado no IP: 168.121.7.23 com sucesso!\n\n";

        } catch (ExceptionHandler $e){

            echo "\n\nErro ao instanciar SNMP no IP: 168.121.7.23.$e->getMessage()\n\n";

            die();

        }

        $snmp_manipulate = new Oidsnmp();
    
        // Opensips.
        $SNMP_opensips['OID'] = '1.3.6.1.4.1.8072.1.3.2.3.1.1.9.111.112.115.115.116.97.116.117.115';

        echo "\nPreparando a leitura do OID: $SNMP_opensips[OID]!\n\n";
        
        $SNMP_opensips['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.4.1.8072.1.3.2.3.1.1.9.111.112.115.115.116.97.116.117.115').PHP_EOL);
        $SNMP_opensips['type'] = 'opensips';

        if(empty($snmp_manipulate->where('type', '=', 'opensips')->first())){

            $response_snmp = $snmp_manipulate->store_snmp($SNMP_opensips);

            if(!$response_snmp){

                echo "ERROR: Erro ao cadastrar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} cadastrado com sucesso!!\n\n";

            }


        } else {

            $response_snmp = $snmp_manipulate->update_snmp($SNMP_opensips);
            
            if(!$response_snmp){

                echo "ERROR: Erro ao atualizar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} atualizado com sucesso!!\n\n";

            }

        }

        // RTP Engine.
        $SNMP_rtpengine['OID'] = '1.3.6.1.4.1.8072.1.3.2.3.1.1.9.114.116.112.115.116.97.116.117.115';
        $SNMP_rtpengine['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.4.1.8072.1.3.2.3.1.1.9.114.116.112.115.116.97.116.117.115').PHP_EOL);
        $SNMP_rtpengine['type'] = 'rtpengine';

        if(empty($snmp_manipulate->where('type', '=', 'rtpengine')->first())){

            $response_snmp = $snmp_manipulate->store_snmp($SNMP_rtpengine);

            if(!$response_snmp){

                echo "ERROR: Erro ao cadastrar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} cadastrado com sucesso!!\n\n";

            }


        } else {

            $response_snmp = $snmp_manipulate->update_snmp($SNMP_rtpengine);

            if(!$response_snmp){

                echo "ERROR: Erro ao atualizar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} atualizado com sucesso!!\n\n";

            }
            
        }

        // Pizza.

        // Memória SWAP.
        $SNMP_swap['OID'] = '1.3.6.1.4.1.2021.4.3.0';
        $SNMP_swap['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.4.1.2021.4.3.0').PHP_EOL);
        $SNMP_swap['type'] = 'swap';

        if(empty($snmp_manipulate->where('type', '=', 'swap')->first())){

            $response_snmp = $snmp_manipulate->store_snmp($SNMP_swap);

            if(!$response_snmp){

                echo "ERROR: Erro ao cadastrar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} cadastrado com sucesso!!\n\n";

            }


        } else {

            $response_snmp = $snmp_manipulate->update_snmp($SNMP_swap);

            if(!$response_snmp){

                echo "ERROR: Erro ao atualizar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} atualizado com sucesso!!\n\n";

            }
            
        }

        // Memória SWAP Disponível.
        $SNMP_swap_d['OID'] = '1.3.6.1.4.1.2021.4.4.0';
        $SNMP_swap_d['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.4.1.2021.4.4.0').PHP_EOL);
        $SNMP_swap_d['type'] = 'swap_d';

        if(empty($snmp_manipulate->where('type', '=', 'swap_d')->first())){

            $response_snmp = $snmp_manipulate->store_snmp($SNMP_swap_d);

            if(!$response_snmp){

                echo "ERROR: Erro ao cadastrar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} cadastrado com sucesso!!\n\n";

            }


        } else {

            $response_snmp = $snmp_manipulate->update_snmp($SNMP_swap_d);

            if(!$response_snmp){

                echo "ERROR: Erro ao atualizar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} atualizado com sucesso!!\n\n";

            }
            
        }

        // Memória Física.
        $SNMP_fisica['OID'] = '1.3.6.1.4.1.2021.4.5.0';
        $SNMP_fisica['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.4.1.2021.4.5.0').PHP_EOL);
        $SNMP_fisica['type'] = 'fisica';

        if(empty($snmp_manipulate->where('type', '=', 'fisica')->first())){

            $response_snmp = $snmp_manipulate->store_snmp($SNMP_fisica);

            if(!$response_snmp){

                echo "ERROR: Erro ao cadastrar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} cadastrado com sucesso!!\n\n";

            }


        } else {

            $response_snmp = $snmp_manipulate->update_snmp($SNMP_fisica);

            if(!$response_snmp){

                echo "ERROR: Erro ao atualizar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} atualizado com sucesso!!\n\n";

            }
            
        }

        // Memória Física Usada.
        $SNMP_fisica_u['OID'] = '1.3.6.1.4.1.2021.4.6.0';
        $SNMP_fisica_u['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.4.1.2021.4.6.0').PHP_EOL);
        $SNMP_fisica_u['type'] = 'fisica_u';

        if(empty($snmp_manipulate->where('type', '=', 'fisica_u')->first())){

            $response_snmp = $snmp_manipulate->store_snmp($SNMP_fisica_u);

            if(!$response_snmp){

                echo "ERROR: Erro ao cadastrar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} cadastrado com sucesso!!\n\n";

            }


        } else {

            $response_snmp = $snmp_manipulate->update_snmp($SNMP_fisica_u);

            if(!$response_snmp){

                echo "ERROR: Erro ao atualizar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} atualizado com sucesso!!\n\n";

            }
            
        }

        // Memória Física Disponível.
        $SNMP_fisica_d['OID'] = '1.3.6.1.4.1.2021.4.11.0';
        $SNMP_fisica_d['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.4.1.2021.4.11.0').PHP_EOL);
        $SNMP_fisica_d['type'] = 'fisica_d';

        if(empty($snmp_manipulate->where('type', '=', 'fisica_d')->first())){

            $response_snmp = $snmp_manipulate->store_snmp($SNMP_fisica_d);

            if(!$response_snmp){

                echo "ERROR: Erro ao cadastrar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} cadastrado com sucesso!!\n\n";

            }


        } else {

            $response_snmp = $snmp_manipulate->update_snmp($SNMP_fisica_d);

            if(!$response_snmp){

                echo "ERROR: Erro ao atualizar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} atualizado com sucesso!!\n\n";

            }
            
        }

        // Uso de CPU.
        $SNMP_cpu['OID'] = '1.3.6.1.4.1.2021.11.9.0';
        $SNMP_cpu['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.4.1.2021.11.9.0').PHP_EOL);
        $SNMP_cpu['type'] = 'cpu';

        if(empty($snmp_manipulate->where('type', '=', 'cpu')->first())){

            $response_snmp = $snmp_manipulate->store_snmp($SNMP_cpu);

            if(!$response_snmp){

                echo "ERROR: Erro ao cadastrar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} cadastrado com sucesso!!\n\n";

            }


        } else {

            $response_snmp = $snmp_manipulate->update_snmp($SNMP_cpu);

            if(!$response_snmp){

                echo "ERROR: Erro ao atualizar o OID: {$SNMP_opensips['type']}!\n\n";

            } else {

                echo "OID: {$SNMP_opensips['type']} atualizado com sucesso!!\n\n";

            } 

        }

        // ====================================================

        $snmp_manipulate = new Oidoctet();

        // ifInOctets.
        $SNMP_octets['OID'] = '1.3.6.1.2.1.2.2.1.10.2';
        $SNMP_octets['value'] = str_replace("\n", "", $SNMP_request->getValue('1.3.6.1.2.1.2.2.1.10.2').PHP_EOL);
        $SNMP_octets['type'] = 'octets';

        $response_snmp = $snmp_manipulate->store_snmp_octets($SNMP_octets);

        if(!$response_snmp){

            echo "ERROR: Erro ao registrar o OID: {$SNMP_opensips['type']}!\n\n";

        } else {

            echo "OID: {$SNMP_opensips['type']} registrado com sucesso!!\n\n";

        }

    }

}