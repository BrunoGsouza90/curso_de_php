<?php

    require_once '../database.php';

    abstract class Conta extends ConexaoBanco{

        private $nome;
        private $tipo;

        public function set_nome($nome){

            $this->nome = $nome;

        }

        public function get_nome(){

            return $this->tipo;

        }


        public function set_tipo($tipo){

            $this->tipo = $tipo;

        }

        public function get_tipo(){

            return $this->tipo;

        }
        
    }
    
?>