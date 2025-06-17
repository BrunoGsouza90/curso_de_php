<?php

    $dbhost = '172.17.0.1';
    $dbuser = 'root';
    $dbpass = 'bruno';
    $dbname = 'manipulacao_de_dados';

    try{

        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Banco de Dados conectado com sucesso!\n\n";

      } catch(PDOException $e){

        echo "Falha na conexão: " . $e->getMessage(). "\n\n";

      }

      $pessoas = $conn->query("SELECT * FROM pessoas");

      foreach($pessoas as $key => $pessoa){

        echo intval($key) + 1 . " - {$pessoa['nome']} {$pessoa['sobrenome']}\n";

      }

?>