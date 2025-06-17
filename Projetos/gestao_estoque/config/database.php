<?php

    // Arquivo de Conexão com o Banco de Dados.

    include_once 'constantes.php';

    // Classe de conexão com o Banco de Dados.
    class ConexaoBanco{

        protected $conn;

        // Conexão com o Banco de Dados.
        public function conectarBanco(){

            $this->conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;      

        }

        // Desconexão com o Banco de Dados.
        protected function desconectarBanco(){

            $this->conn = null;

        }

    }

?>