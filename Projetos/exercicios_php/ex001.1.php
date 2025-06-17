<?php

    date_default_timezone_set('America/Sao_Paulo');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data = $_POST['data'];
        $dia = date('d', strtotime($data));
        $mes = date('m', strtotime($data));
        $ano = date('Y', strtotime($data));

        echo "A data enviada é: $data. <br> Dia: $dia. <br> Mês: $mes. <br> Ano: $ano.";

    }

?>