<?php

    class Pessoas{

        private $nome;
        private $idade;
        private $sexo;

        function __construct($nome, $idade, $sexo){

            $this->nome = $nome;
            $this->idade = $idade;
            $this->sexo = $sexo;

        }
        
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

            $this->idade += 1;
            echo "<p>Feliz aniversário " . $this->nome . "!<br>Agora você tem " . $this->idade . " anos de idade.</p><br>";

        }

    }

?>