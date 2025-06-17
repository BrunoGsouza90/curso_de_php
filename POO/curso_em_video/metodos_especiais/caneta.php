<?php

    class Caneta{

        private $modelo;
        private $ponta;
        private $tampada;

        public function __construct($tampada = true){

            $this->tampada = $tampada;

            if($this->tampada == true){

                echo "A caneta está tampada!<br>";

            } else {

                echo "A caneta está destampada!<br>";

            }

        }

        public function __destruct(){

            echo "Caneta usada com sucesso!";

        }

        // =========================================

        public function getModelo(){

            return $this->modelo;

        }

        public function setModelo($modelo){

            $this->modelo = $modelo;

        }

        // =========================================

        public function getPonta(){

            return $this->ponta;

        }

        public function setPonta($ponta){

            $this->ponta = $ponta;

        }

        // =========================================

    }

?>