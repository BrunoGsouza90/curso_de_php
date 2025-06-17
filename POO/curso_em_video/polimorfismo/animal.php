<?php

    abstract class Animal{

        protected $peso;
        protected $idade;
        protected $membros;

        public function set_peso($peso){

            $this->peso = $peso;

        }

        public function get_peso(){

            return $this->peso;

        }

        public function set_idade($idade){

            $this->idade = $idade;

        }

        public function get_idade(){

            return $this->idade;

        }

        public function set_membros($membros){

            $this->membros = $membros;

        }

        public function get_membros(){

            return $this->membros;

        }

        // ==============================================

        abstract function locomover();
        abstract function alimentar();
        abstract function emitirSom();

    }

?>