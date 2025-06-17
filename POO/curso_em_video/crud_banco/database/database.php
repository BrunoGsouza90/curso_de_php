<?php

    require_once 'constante.php';

    class ConexaoBanco{

        protected $conn;
        
        function __construct(){
            
            $this->conectarBanco();

        }

        function conectarBanco(){

            $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
            
            if($this->conn->connect_error){

                die("<p>Erro na conexão: " . $this->conn->connect_error) . "</p>";

              }

              echo "<p>Conexão realizada com sucesso!</p>";

        }

    }

?>