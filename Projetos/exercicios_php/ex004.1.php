<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $estado = $_POST['estado'];

    $regioes = [
        "" => "Nenhuma região selecionada.",
        "AC" => "Região Norte",
        "AL" => "Região Nordeste",
        "AM" => "Região Norte",
        "AP" => "Região Norte",
        "BA" => "Região Nordeste",
        "CE" => "Região Nordeste",
        "DF" => "Região Centro-Oeste",
        "ES" => "Região Sudeste",
        "GO" => "Região Centro-Oeste",
        "MA" => "Região Nordeste",
        "MG" => "Região Sudeste",
        "MS" => "Região Centro-Oeste",
        "MT" => "Região Centro-Oeste",
        "PA" => "Região Norte",
        "PB" => "Região Nordeste",
        "PE" => "Região Nordeste",
        "PI" => "Região Nordeste",
        "PR" => "Região Sul",
        "RJ" => "Região Sudeste",
        "RN" => "Região Nordeste",
        "RO" => "Região Norte",
        "RR" => "Região Norte",
        "RS" => "Região Sul",
        "SC" => "Região Sul",
        "SE" => "Região Nordeste",
        "SP" => "Região Sudeste",
        "TO" => "Região Norte"
    ];

    if($regioes[$estado] == 'Nenhuma região selecionada.'){

        echo "$regioes[$estado]";

    } else {

        echo "A região selecionada foi a $regioes[$estado] do Brasil.";
        
    }

}

?>