<?php

    require_once 'pessoas.php';

    class Professores extends Pessoas{

        private $especialidade;
        private $salario;

        function __construct($nome, $idade, $sexo, $especialidade, $salario){

            $this->set_nome($nome);
            $this->set_idade($idade);
            $this->set_sexo($sexo);
            $this->set_salario($salario);
            $this->set_especialidade($especialidade);

        }

        public function set_especialidade($especialidade){

            $this->especialidade = $especialidade;

        }

        public function get_especialidade(){

            return $this->especialidade;

        }

        public function set_salario($salario){

            $this->salario = $salario;

        }

        public function get_salario(){

            return $this->salario;

        }

        // ==========================================

        public function receberAumento($aumento){

            $this->set_salario($this->get_salario() + $aumento);
            echo "<p>Aumento realizado com sucesso!<br>O de(a) " . $this->get_nome() . " salário salário é R$ " . number_format($this->get_salario(),2,',','.') . ".</p><br>";

            

        }

    }

?>