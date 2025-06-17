<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $telefone = $_POST['telefone'];
        $ddd = substr($telefone, 0, 2);
        $numero = substr($telefone, 2, 10);

        echo "O número enviado foi : $telefone. <br>";

        echo "DDD: $ddd.<br>";
        echo "Número: $numero.";

    }

?>