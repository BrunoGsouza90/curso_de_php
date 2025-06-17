<?php

    // Arquivo de configuração do Banco de Dados.

    // Arquivo com as constantes de conexão do Banco.
    include_once 'constantes.php';
    
    // Classe responsável pela conexão e desconexão com o Banco de Dados.
    class Conexao{

        protected $conn;

        // ==============================================

        // Método para conexão com o Banco de Dados.
        public function conectarBanco(){

            try{

                $this->conn = new PDO("mysql:host=" . DBHOST . ";dbname=". DBNAME , DBUSER, DBPASS);
                  
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              } catch(PDOException $e){
                
                echo "Falha na conexão com o Banco de Dados: " . $e->getMessage();

              }

        }

        // Método para desconectar com o Banco de Dados.
        protected function desconectarBanco(){

          $this->conn = null;

        }

    }

?>