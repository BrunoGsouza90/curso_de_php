<?php

    require_once 'pessoas.php';

    class Funcionarios extends Pessoas{

        public $nome;
        private $setor;
        private $trabalhando;

        function __construct($nome, $idade, $sexo, $setor){
                     
            $this->set_nome($nome);
            $this->set_idade($idade);
            $this->set_sexo($sexo);
            $this->set_setor($setor);
            $this->set_trabalhando(true);

            

        }

        function set_setor($setor){

            $this->setor = $setor;

        }

        function get_setor(){

            return $this->setor;

        }
        
        function set_trabalhando($trabalhando){

            $this->trabalhando = $trabalhando;

        }

        function get_trabalhando(){

            return $this->trabalhando;

        }

        // ==========================================

        public function mudarTrabalho($trabalho){

            $this->set_setor($trabalho);
            echo "<p>Serviço alterado com sucesso!</p>";
            echo "<p>Agora " . $this->get_nome() . " trabalha como " . $this->get_setor() . ".</p>";

        }

    }

?>