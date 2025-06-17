<?php

    // Arquivo responsável pelas classes abstratas para as models.

    include_once 'config/database.php';

    // Classe abstrata para Clientes e Fornecedores.
    abstract class StakeHolders extends ConexaoBanco{

        private $id;
        private $razaosocial;
        private $cnpj_cpf;

        private $rua;
        private $numero;
        private $bairro;
        private $cep;
        private $estado;

        private $telefone;
        private $email;

        public $mensagens = [

            "sucesso" => [],
            "erro" => []

        ];

        public function set_id($id){

            $this->id = $id;

        }

        public function get_id(){

            return $this->id;

        }

        public function set_razaosocial($razaosocial){

            $this->razaosocial = $razaosocial;

        }

        public function get_razaosocial(){

            return $this->razaosocial;

        }

        public function set_cnpj_cpf($cnpj_cpf){

            $this->cnpj_cpf = $cnpj_cpf;

        }

        public function get_cnpj_cpf(){

            return $this->cnpj_cpf;

        }

        public function set_rua($rua){

            $this->rua = $rua;

        }

        public function get_rua(){

            return $this->rua;

        }

        public function set_numero($numero){

            $this->numero = $numero;

        }

        public function get_numero(){

            return $this->numero;

        }

        public function set_bairro($bairro){

            $this->bairro = $bairro;

        }

        public function get_bairro(){

            return $this->bairro;

        }

        public function set_cep($cep){

            $this->cep = $cep;

        }

        public function get_cep(){

            return $this->cep;

        }

        public function set_estado($estado){

            $this->estado = $estado;

        }

        public function get_estado(){

            return $this->estado;

        }

        public function set_telefone($telefone){

            $this->telefone = $telefone;

        }

        public function get_telefone(){

            return $this->telefone;

        }

        public function set_email($email){

            $this->email = $email;

        }

        public function get_email(){

            return $this->email;

        }

    }

?>