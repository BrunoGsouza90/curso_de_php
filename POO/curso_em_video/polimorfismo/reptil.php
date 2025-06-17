<?php

    require_once 'animal.php';

    class Reptil extends Animal{

        private $corEscama;

        public function set_corEscama($corEscama){

            $this->corEscama = $corEscama;

        }

        public function get_corEscama(){

            return $this->corEscama;

        }

        // ==============================================

        public function alimentar(){

            echo "<p>Comendo vegetais!</p>";

        }

        public function locomover(){

            echo "<p>Rastejando!</p>";

        }

        public function emitirSom(){

            echo "<p>Som de Réptil!</p>";

        }

    }

?>