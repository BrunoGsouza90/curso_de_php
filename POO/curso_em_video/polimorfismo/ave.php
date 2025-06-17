<?php

    require_once 'animal.php';

    class Ave extends Animal{

        private $corPena;

        public function set_corPena($corPena){

            $this->corPena = $corPena;

        }

        public function get_corPena(){

            return $this->corPena;

        }

        // ==============================================

        public function alimentar(){

            echo "<p>Comendo frutas!</p>";

        }

        public function locomover(){

            echo "<p>Voando!</p>";

        }

        public function emitirSom(){

            echo "<p>Som de Ave!</p>";

        }

        public function fazendoNinho(){

            echo "<p>Construindo um ninho...</p>";

        }

    }

?>