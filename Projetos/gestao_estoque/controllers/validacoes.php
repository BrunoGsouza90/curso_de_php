<?php

    // Arquivo de classes abstratas de validações.

    // Classe abstrata de validação para Clientes e Fornecedores.
    trait ValidacoesStakeHolders{

        // Propriedades stakeholders.
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

        // Propriedades clientes.
        private $nascimento;
        private $profissao;
        private $sexo;

        // Propriedades fornecedores.
        private $ins_estadual;
        private $ins_municipal;
        private $produto_servico;

        // Propriedades validações.
        private $sql;
        private $type;

        // Getters e Setters clientes e fornecedores.

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

        // Getters e Seterrs clientes.
        public function set_nascimento($nascimento){

            $this->nascimento = $nascimento;

        }

        public function get_nascimento(){

            return $this->nascimento;

        }

        public function set_profissao($profissao){

            $this->profissao = $profissao;

        }

        public function get_profissao(){

            return $this->profissao;

        }

        public function set_sexo($sexo){

            $this->sexo = $sexo;

        }

        public function get_sexo(){

            return $this->sexo;

        }

        //Getters e Setters fornecedores.
        public function set_ins_estadual($ins_estadual){

            $this->ins_estadual = $ins_estadual;

        }

        public function get_ins_estadual(){

            return $this->ins_estadual;

        }

        public function set_ins_municipal($ins_municipal){

            $this->ins_municipal = $ins_municipal;

        }

        public function get_ins_municipal(){

            return $this->ins_municipal;

        }

        public function set_produto_servico($produto_servico){

            $this->produto_servico = $produto_servico;

        }

        public function get_produto_servico(){

            return $this->produto_servico;

        }

        // Getters e Setters validações.
        protected function set_sql($sql){
            
            $this->sql = $sql;

        }

        protected function get_sql(){

            return $this->sql;

        }

        protected function set_type($type){

            $this->type = $type;

        }

        protected function get_type(){

            return $this->type;

        }

    }

?>