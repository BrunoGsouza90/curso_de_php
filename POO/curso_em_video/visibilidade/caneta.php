<?php

    class Caneta{

        public $modelo;
        public $cor;
        private $ponta;
        protected $carga;
        public $tampada;

        public function rabiscar(){

            if($this->tampada == true){

                echo "<p>Não posso rabiscar a caneta está tampada!</p>";

            } else {

                echo "<p>Estou rabiscando...</p>";

            }

        }

        public function tampar(){

            $this->tampada = true;
            echo "Caneta tampada!";

        }

        private function destampar(){

            $this->tampada = false;
            echo "Caneta destampada";

        }

    }

?>