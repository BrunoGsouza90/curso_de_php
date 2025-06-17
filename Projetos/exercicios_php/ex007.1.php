<?php

    date_default_timezone_set('America/Sao_Paulo');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $mes = $_POST['mes'];

        $meses = [
            "01" => 'Janeiro',
            "02" => 'Fevereiro',
            "03" => 'Março',
            "04" => 'Abril',
            "05" => 'Maio',
            "06" => 'Junho',
            "07" => 'Julho',
            "08" => 'Agosto',
            "09" => 'Setembro',
            "10" => 'Outubro',
            "11" => 'Novembro',
            "12" => 'Dezembro'
        ];

        echo 'O mês selecionado foi: ';

        switch ($mes) {

            case 1:
                echo $meses["01"];
                break;
    
            case 2:
                echo $meses["02"];
                break;
    
            case 3:
                echo $meses["03"];
                break;
    
            case 4:
                echo $meses["04"];
                break;
    
            case 5:
                echo $meses["05"];
                break;
    
            case 6:
                echo $meses["06"];
                break;
    
            case 7:
                echo $meses["07"];
                break;
    
            case 8:
                echo $meses["08"];
                break;
    
            case 9:
                echo $meses["09"];
                break;
    
            case 10:
                echo $meses["10"];
                break;
    
            case 11:
                echo $meses["11"];
                break;
    
            case 12:
                echo $meses["12"];
                break;
    
            default:
                echo "Mês inválido!";
        }

        echo '.';
        
    }

?>