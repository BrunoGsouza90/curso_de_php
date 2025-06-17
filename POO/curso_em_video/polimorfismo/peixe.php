<?php

    require_once 'animal.php';

    class Peixe extends Animal{

        private $corEscama;

        public function set_corEscama($corEscama){

            $this->corEscama = $corEscama;

        }

        public function get_corEscama(){

            return $this->corEscama;

        }

        // ==============================================

        public function alimentar(){

            echo "<p>Comendo substâncias!</p>";

        }

        public function locomover(){

            echo "<p>Nadando!</p>";

        }

        public function emitirSom(){

            echo "<p>Peixe não faz som!</p>";

        }

        public function soltarBolha(){

            echo "<p>Soltou uma bolha...</p>";

        }

    }

?>