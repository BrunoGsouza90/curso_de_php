<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nota = $_POST['nota'];

        echo "A nota do aluno foi: $nota.<br>";

        if($nota >= 7 && $nota < 10){

            echo 'Aprovado!';

        } else if($nota < 7){

            echo 'Reprovado!';

        } else if($nota == 10){

            echo 'Aprovado com distinção!';

        }

    }

?>