<?php

    class Pessoas{

        private $nome;
        private $idade;
        private $sexo;

        public function set_nome($nome){

            $this->nome = $nome;

        }

        public function get_nome(){

            return $this->nome;

        }

        public function set_idade($idade){

            $this->idade = $idade;

        }

        public function get_idade(){

            return $this->idade;

        }

        public function set_sexo($sexo){

            $this->sexo = $sexo;

        }

        public function get_sexo(){

            return $this->sexo;

        }

        // ==========================================

        public function fazerAniversario(){

        }

    }

?>