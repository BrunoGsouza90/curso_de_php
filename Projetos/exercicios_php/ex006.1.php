<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $ultimonome = $_POST['ultimonome'];

        echo "Nome em letras maiúscula: " . strtoupper($nome) . " " . strtoupper($sobrenome) . " " . strtoupper($ultimonome) . ".<br>";

        echo "Nome em letras minúsculas: " . strtolower($nome) . " " . strtolower($sobrenome) . " " . strtolower($ultimonome) .".<br>" ;

        echo "Nome em letras minúsculas: " . ucfirst($nome) . " " . ucfirst($sobrenome) . " " . ucfirst($ultimonome) .".<br>" ;

        date_default_timezone_set('America/Sao_Paulo');

        $data = date("d/m/Y H:i:s");

        echo "A data e hora atual é: $data. ";

    }

?>