<?php

    class Lutador{

        private $nome;
        private $nacionalidade;
        private $idade, $altura, $peso;
        private $categoria, $vitorias, $derrotas, $impates;

        function __construct($nome, $nacionalidade, $idade, $altura, $peso, $vitorias, $derrotas, $impates){
            
            $this->nome = $nome;
            $this->nacionalidade = $nacionalidade;
            $this->idade = $idade;
            $this->altura = $altura;
            $this->peso = $peso;
            $this->vitorias = $vitorias;
            $this->derrotas = $derrotas;
            $this->impates = $impates;

            if($this->peso < 52.2){

                $this->categoria = 'Inválida';

            } else if ($this->peso <= 70.3){

                $this->categoria = 'Leve';

            } else if ($this->peso <= 83.9){

                $this->categoria = 'Média';

            } else if ($this->peso <= 102.2){

                $this->categoria = 'Pesada';

            } else {

                $this->categoria = 'Inválida';

            }

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

        public function set_nacionalidade($nacionalidade){

            $this->nacionalidade = $nacionalidade;

        }

        public function get_nacionalidade(){

            return $this->nacionalidade;

        }

        public function set_altura($altura){

            $this->altura = $altura;

        }
        
        public function get_altura(){

            return $this->altura;

        }

        public function set_peso($peso){

            $this->peso = $peso;
            $this->set_categoria();

        }
        
        public function get_peso(){

            return $this->peso;

        }

        public function set_categoria(){

            

        }

        public function get_categoria(){

            return $this->categoria;

        }

        public function set_vitorias($vitorias){

            $this->vitorias = $vitorias;

        }

        public function get_vitorias(){

            return $this->vitorias;

        }

        public function set_derrotas($derrotas){

            $this->derrotas = $derrotas;

        }

        public function get_derrotas(){

            return $this->derrotas;

        }

        public function set_impates($impates){

            $this->impates = $impates;

        }

        public function get_impates(){

            return $this->impates;

        }

        // ==========================================

        public function apresentar(){

            echo "<p>CHEGOU A HORA! O lutador " . $this->get_nome() . ".<br>";
            echo "<p>Veio diretamente do " . $this->get_nacionalidade() . ".</p><br>";
            echo "<p>Com " . $this->get_idade() . " anos de idade e  " . $this->get_peso() . " Kg.</p><br>";
            echo "<p>Em sua carreira adquiriu " . $this->get_vitorias() . " vitórias, " . $this->get_derrotas() . " derrtotas e " . $this->get_impates() . " impate.</p><br>";

        }

        public function status(){

            echo "<p>" . $this->get_nome() . " é um peso de categoria " . $this->get_categoria() . ".</p><br>";

        }

        public function ganharLuta(){

            $this->set_vitorias($this->get_vitorias() + 1);

        }

        public function pederLuta(){

            $this->set_derrotas($this->get_derrotas() + 1);

        }

        public function empatarLuta(){

            $this->set_impates($this->get_impates() + 1);

        }

    }

?>