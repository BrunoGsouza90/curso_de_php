<?php

    require_once 'controlador.php';

    class ControleRemoto implements Controlador{

        private $volume;
        private $ligado;
        private $tocando;

        function __construct(){

            echo "Seja bem-vindo ao aplicativo TV!<br><br>";
            $this->volume = 50;
            $this->ligado = false;
            $this->tocando = false;

        }

        public function set_volume($volume){

            $this->volume = $volume;

        }

        public function get_volume(){

            return $this->volume;

        }


        public function set_ligado($ligado){

            $this->ligado = $ligado;

        }

        public function get_ligado(){

            return $this->ligado;

        }


        public function set_tocando($tocando){

            $this->tocando = $tocando;

        }

        public function get_tocando(){

            return $this->tocando;

        }

        // ==========================================

        public function ligar(){

            $this->set_ligado(true);
            echo "<br>Controle ligado com sucesso!<br>";

        }

        public function desligar(){

            $this->set_ligado(false);
            echo "<br>Controle desligado com sucesso!<br>";

        }

        public function abrirMenu(){

            echo "<br>Está ligado? " . ($this->get_ligado() ? "Sim, está ligado!" : "Não, está desligado!");

            echo "<br>";

            echo "Está tocando? " . ($this->get_tocando() ? "Sim, está tocando!" : "Não, não está tocando!<br>");

            echo "Volume: " . $this->volume . ".<br>";

            for($i = 0; $i < $this->get_volume(); $i += 10){

                echo "|";

            }

            echo "<br>";

        }

        public function fecharMenu(){

            echo "<br>Fechando o menu.<br>";

        }

        public function maisVolume(){

            if($this->get_ligado()){

                $this->set_volume($this->get_volume() + 10);

            } else {

                echo "A TV está desligada!";

            }

        }

        public function menosVolume(){

            if($this->get_ligado()){

                $this->set_volume($this->get_volume() + 10);

            } else {

                echo "<br>A TV está desligada!";

            }

        }

        public function ligarMudo(){

            if($this->get_ligado()){

                $this->get_tocando(false);
                echo "<br>A TV está no mudo!";

            } else {

                echo "<br>A TV está desligada!";

            }

        }

        public function desligarMudo(){

            if($this->get_ligado()){

                $this->get_tocando(true);
                echo "<br>A TV está tocando!";

            } else {

                echo "<br>A TV está desligada!";

            }

        }

        public function play(){

            if($this->get_ligado()){

                echo "<br>A TV já está ligada!<br>";

            } else {

                $this->set_ligado(true);
                echo "<br>TV ligada com sucesso.<br>";

            }

        }

        public function pause(){

            if(!$this->get_ligado()){

                echo "<br>A TV já está desligada!<br>";

            } else {

                $this->set_ligado(false);
                echo "<br>TV desligada com sucesso!<br>";

            }

        }

    }

?>