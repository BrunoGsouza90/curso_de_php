<?php

    $host = '172.17.0.1';
    $dbname = 'projeto_agenda';
    $user = 'root';
    $pass = 'bruno';

    try{

        $conn = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){

        echo "Erro na conexão: " . $e->getMessage();

    }

?>