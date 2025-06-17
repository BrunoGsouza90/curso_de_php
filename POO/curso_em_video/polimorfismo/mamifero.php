<?php

    require_once 'animal.php';

    class Mamifero extends Animal{

        private $corPelo;

        public function set_corPelo($corPelo){

            $this->corPelo = $corPelo;

        }

        public function get_corPelo(){

            return $this->corPelo;

        }

        // ==============================================

        public function alimentar(){

            echo "<p>Mamando!</p>";

        }

        public function locomover(){

            echo "<p>Som de Mamífero!</p>";

        }

        public function emitirSom(){

            echo "<p>Correndo!</p>";

        }

    }

?>