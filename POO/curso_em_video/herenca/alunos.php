<?php

    require_once 'pessoas.php';

    class Alunos extends Pessoas{

        private $matricula;
        private $curso;

        function __constructor($nome, $idade, $sexo, $matricula, $curso){

            $this->set_nome($nome);
            $this->set_idade($idade);
            $this->set_sexo($sexo);
            $this->set_matricula($matricula);
            $this->set_curso($curso);

        }

        public function set_matricula($matricula){

            $this->matricula = $matricula;

        }

        public function get_matricula(){

            return $this->matricula;

        }

        public function set_curso($curso){

            $this->curso = $curso;

        }

        public function get_curso(){

            return $this->curso;

        }

        // ==========================================

        public function cancelarMatricula(){

            echo "<p>Matrícula cancelada!</p>";

        }

    }

?>