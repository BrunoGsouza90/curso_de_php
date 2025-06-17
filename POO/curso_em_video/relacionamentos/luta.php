<?php

    require_once 'lutador.php';

    class Luta{

        private $desafiado;
        private $desafiante; 
        private $rounds;
        private $aprovada;

        public function set_desafiado($desafiado){

            $this->desafiado = $desafiado;

        }

        public function get_desafiado(){

            return $this->desafiado;

        }

        public function set_desafiante($desafiante){

            $this->desafiante = $desafiante;

        }

        public function get_desafiante(){

            return $this->desafiante;

        }

        public function set_rounds($rounds){

            $this->rounds = $rounds;

        }

        public function get_rounds(){

            return $this->rounds;

        }

        public function set_aprovada($aprovada){

            $this->aprovada = $aprovada;

        }

        public function get_aprovada(){

            return $this->aprovada;

        }

        // ==========================================

        public function marcarLuta($lutador1, $lutador2){

            if($lutador1->get_categoria() == $lutador2->get_categoria()){

                if($lutador1->get_nome() == $lutador2->get_nome()){

                    echo "<p>Os lutadores precisam ser diferentes!</p><br>";
                    $this->set_aprovada(false);

                } else {

                    echo "<p>Luta aprovada com sucesso!</p><br>";
                    $this->set_aprovada(true);
                    $this->desafiante = $lutador1;
                    $this->desafiado = $lutador2;

                }

            } else {

                echo "<p>Os lutadores não podem lutar são de categorias diferentes.</p><br>";
                $this->set_aprovada(false);

            }

        }

        public function lutar(){

            if($this->get_aprovada()){

                $this->desafiado->apresentar();
                $this->desafiante->apresentar();
                $vencedor = rand(0, 3);

                if($vencedor == 1){

                    echo "<p>" . $this->desafiado->get_nome() . " ganhou a luta!</p><br>";

                    $this->desafiado->ganharLuta();
                    $this->desafiante->perderLuta();

                } else if ($vencedor == 2){

                    echo "<p>" . $this->desafiante->get_nome() . " ganhou a luta!</p><br>";
                    $this->desafiante->ganharLuta();
                    $this->desafiado->perderLuta();

                } else {

                    echo "<p>Houve um impate!</p><br>";
                    $this->desafiado->empatarLuta();
                    $this->desafiante->empatarLuta();

                }

            } else {

                echo "<p>Essa luta não foi aprovada!</p><br>";

            }

        }

    }

?>