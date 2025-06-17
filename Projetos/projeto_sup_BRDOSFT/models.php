<?php

    // Arquivo responsável pela manipulação no Banco de Dados.

    // Include do arquivo de conexão com o Banco de Dados.
    include_once 'database.php';

    // Classe responsável pela manipulação dos dados vindos do csv.php.
    class SUP extends Conexao{

        private $id;
        private $regiao;
        private $uf;
        private $cn;
        private $cnl_municipio;
        private $descricao_municipio;
        private $cnl_localidade;
        private $descricao_localidade;
        private $bairro;
        private $codigo_tri;
        private $codigo_fixa;
        private $codigo_movel;
        private $tarifa_fixa;
        private $tarifa_movel;
        private $prestadora_chamada;
        private $data_ativacao;
        private $data_desativacao;
        private $pessoa_sup;
        private $telefone_sup;
        private $email_sup;
        private $remuneracao_fixa;
        private $nome_sup;
        private $remuneracao_movel;
        private $prestadora_sup;
        private $data_comunicacao;
        private $tipo_servico;

        private $sql;

        function inserirDados($regiao, $uf, $cn, $cnl_municipio, $descricao_municipio, $cnl_localidade, $descricao_localidade, $bairro, $codigo_tri, $codigo_fixa, $codigo_movel, $tarifa_fixa, $tarifa_movel, $prestadora_chamada, $data_ativacao, $data_desativacao, $pessoa_sup, $telefone_sup, $email_sup, $remuneracao_fixa, $nome_sup, $remuneracao_movel, $prestadora_sup, $data_comunicacao, $tipo_servico){

            $this->set_regiao($regiao);
            $this->set_uf($uf);
            $this->set_cn($cn);
            $this->set_cnl_municipio($cnl_municipio);
            $this->set_descricao_municipio($descricao_municipio);
            $this->set_cnl_localidade($cnl_localidade);
            $this->set_descricao_localidade($descricao_localidade);
            $this->set_bairro($bairro);
            $this->set_codigo_tri($codigo_tri);
            $this->set_codigo_fixa($codigo_fixa);
            $this->set_codigo_movel($codigo_movel);
            $this->set_tarifa_fixa($tarifa_fixa);
            $this->set_tarifa_movel($tarifa_movel);
            $this->set_prestadora_chamada($prestadora_chamada);
            $this->set_data_ativacao($data_ativacao);
            $this->set_data_desativacao($data_desativacao);
            $this->set_pessoa_sup($pessoa_sup);
            $this->set_telefone_sup($telefone_sup);
            $this->set_email_sup($email_sup);
            $this->set_remuneracao_fixa($remuneracao_fixa);
            $this->set_nome_sup($nome_sup);
            $this->set_remuneracao_movel($remuneracao_movel);
            $this->set_prestadora_sup($prestadora_sup);
            $this->set_data_comunicacao($data_comunicacao);
            $this->set_tipo_servico($tipo_servico);

        }

        protected function set_id($id){

            $this->id = $id;

        }

        protected function get_id(){

            return $this->id;

        }

        protected function set_regiao($regiao){

            $this->regiao = $regiao;

        }

        protected function get_regiao(){

            return $this->regiao;

        }

        protected function set_uf($uf){

            $this->uf = $uf;

        }

        protected function get_uf(){

            return $this->uf;

        }

        protected function set_cn($cn){

            $this->cn = $cn;

        }

        protected function get_cn(){

            return $this->cn;

        }

        protected function set_cnl_municipio($cnl_municipio){

            $this->cnl_municipio = $cnl_municipio;

        }

        protected function get_cnl_municipio(){

            return $this->cnl_municipio;

        }

        protected function set_descricao_municipio($descricao_municipio){

            $this->descricao_municipio = $descricao_municipio;

        }

        protected function get_descricao_municipio(){

            return $this->descricao_municipio;

        }

        protected function set_cnl_localidade($cnl_localidade){

            $this->cnl_localidade = $cnl_localidade;

        }

        protected function get_cnl_localidade(){

            return $this->cnl_localidade;

        }

        protected function set_descricao_localidade($descricao_localidade){

            $this->descricao_localidade = $descricao_localidade;

        }

        protected function get_descricao_localidade(){

            return $this->descricao_localidade;

        }

        protected function set_bairro($bairro){

            $this->bairro = $bairro;

        }

        protected function get_bairro(){

            return $this->bairro;

        }

        protected function set_codigo_tri($codigo_tri){

            $this->codigo_tri = $codigo_tri;

        }

        protected function get_codigo_tri(){

            return $this->codigo_tri;

        }

        protected function set_codigo_fixa($codigo_fixa){

            $this->codigo_fixa = $codigo_fixa;

        }

        protected function get_codigo_fixa(){

            return $this->codigo_fixa;

        }

        protected function set_codigo_movel($codigo_movel){

            $this->codigo_movel = $codigo_movel;

        }

        protected function get_codigo_movel(){

            return $this->codigo_movel;

        }

        protected function set_tarifa_fixa($tarifa_fixa){

            $this->tarifa_fixa = $tarifa_fixa;

        }

        protected function get_tarifa_fixa(){

            return $this->tarifa_fixa;

        }

        protected function set_tarifa_movel($tarifa_movel){

            $this->tarifa_movel = $tarifa_movel;

        }

        protected function get_tarifa_movel(){

            return $this->tarifa_movel;

        }

        protected function set_prestadora_chamada($prestadora_chamada){

            $this->prestadora_chamada = $prestadora_chamada;

        }

        protected function get_prestadora_chamada(){

            return $this->prestadora_chamada;

        }

        protected function set_data_ativacao($data_ativacao){

            $this->data_ativacao = $data_ativacao;

        }

        protected function get_data_ativacao(){

            return $this->data_ativacao;

        }

        protected function set_data_desativacao($data_desativacao){

            $this->data_desativacao = $data_desativacao;

        }

        protected function get_data_desativacao(){

            return $this->data_desativacao;

        }

        protected function set_pessoa_sup($pessoa_sup){

            $this->pessoa_sup = $pessoa_sup;

        }

        protected function get_pessoa_sup(){

            return $this->pessoa_sup;

        }

        protected function set_telefone_sup($telefone_sup){

            $this->telefone_sup = $telefone_sup;

        }

        protected function get_telefone_sup(){

            return $this->telefone_sup;

        }

        protected function set_email_sup($email_sup){

            $this->email_sup = $email_sup;

        }

        protected function get_email_sup(){

            return $this->email_sup;

        }

        protected function set_remuneracao_fixa($remuneracao_fixa){

            $this->remuneracao_fixa = $remuneracao_fixa;

        }

        protected function get_remuneracao_fixa(){

            return $this->remuneracao_fixa;

        }

        protected function set_nome_sup($nome_sup){

            $this->nome_sup = $nome_sup;

        }

        protected function get_nome_sup(){

            return $this->nome_sup;

        }

        protected function set_remuneracao_movel($remuneracao_movel){

            $this->remuneracao_movel = $remuneracao_movel;

        }

        protected function get_remuneracao_movel(){

            return $this->remuneracao_movel;

        }

        protected function set_prestadora_sup($prestadora_sup){

            $this->prestadora_sup = $prestadora_sup;

        }

        protected function get_prestadora_sup(){

            return $this->prestadora_sup;

        }

        protected function set_data_comunicacao($data_comunicacao){

            $this->data_comunicacao = $data_comunicacao;

        }

        protected function get_data_comunicacao(){

            return $this->data_comunicacao;

        }

        protected function set_tipo_servico($tipo_servico){

            $this->tipo_servico = $tipo_servico;

        }

        protected function get_tipo_servico(){

            return $this->tipo_servico;

        }

        // ==============================================

        // Método responsável por adicionar os campos vindos do arquivo CSV.
        public function adicionarCampos(){

            try{

                $this->sql = $this->conn->prepare("INSERT INTO dados_sup (regiao, uf, cn, cnl_municipio, descricao_municipio, cnl_localidade, descricao_localidade,bairro, codigo_tri, codigo_fixa, codigo_movel, tarifa_fixa, tarifa_movel, prestadora_chamada, data_ativacao, data_desativacao, pessoa_sup, telefone_sup, email_sup, remuneracao_fixa, nome_sup, remuneracao_movel, prestadora_sup, data_comunicacao, tipo_servico) VALUES (:regiao, :uf, :cn, :cnl_municipio, :descricao_municipio, :cnl_localidade, :descricao_localidade, :bairro, :codigo_tri, :codigo_fixa, :codigo_movel, :tarifa_fixa, :tarifa_movel, :prestadora_chamada, :data_ativacao, :data_desativacao, :pessoa_sup, :telefone_sup, :email_sup, :remuneracao_fixa, :nome_sup,  :remuneracao_movel, :prestadora_sup, :data_comunicacao, :tipo_servico)");

                $regiao = $this->get_regiao();
                $uf = $this->get_uf();
                $cn = $this->get_cn();
                $cnl_municipio = $this->get_cnl_municipio();
                $descricao_municipio = $this->get_descricao_municipio();
                $cnl_localidade = $this->get_cnl_localidade();
                $descricao_localidade = $this->get_descricao_localidade();
                $bairro = $this->get_bairro();
                $codigo_tri = $this->get_codigo_tri();
                $codigo_fixa = $this->get_codigo_fixa();
                $codigo_movel = $this->get_codigo_movel();
                $tarifa_fixa = $this->get_tarifa_fixa();
                $tarifa_movel = $this->get_tarifa_movel();
                $prestadora_chamada = $this->get_prestadora_chamada();
                $data_ativacao = $this->get_data_ativacao();
                $data_desativacao = $this->get_data_desativacao();
                $pessoa_sup = $this->get_pessoa_sup();
                $telefone_sup = $this->get_telefone_sup();
                $email_sup = $this->get_email_sup();
                $remuneracao_fixa = $this->get_remuneracao_fixa();
                $nome_sup = $this->get_nome_sup();
                $remuneracao_movel = $this->get_remuneracao_movel();
                $prestadora_sup = $this->get_prestadora_sup();
                $data_comunicacao = $this->get_data_comunicacao();
                $tipo_servico = $this->get_tipo_servico();

                $this->sql->bindParam(":regiao", $regiao);
                $this->sql->bindParam(":uf", $uf);
                $this->sql->bindParam(":cn", $cn);
                $this->sql->bindParam(":cnl_municipio", $cnl_municipio);
                $this->sql->bindParam(":descricao_municipio", $descricao_municipio);
                $this->sql->bindParam(":cnl_localidade", $cnl_localidade);
                $this->sql->bindParam(":descricao_localidade", $descricao_localidade);
                $this->sql->bindParam(":bairro", $bairro);
                $this->sql->bindParam(":codigo_tri", $codigo_tri);
                $this->sql->bindParam(":codigo_fixa", $codigo_fixa);
                $this->sql->bindParam(":codigo_movel", $codigo_movel);
                $this->sql->bindParam(":tarifa_fixa", $tarifa_fixa);
                $this->sql->bindParam(":tarifa_movel", $tarifa_movel);
                $this->sql->bindParam(":prestadora_chamada", $prestadora_chamada);
                $this->sql->bindParam(":data_ativacao", $data_ativacao);
                $this->sql->bindParam(":data_desativacao", $data_desativacao);
                $this->sql->bindParam(":pessoa_sup", $pessoa_sup);
                $this->sql->bindParam(":telefone_sup", $telefone_sup);
                $this->sql->bindParam(":email_sup", $email_sup);
                $this->sql->bindParam(":remuneracao_fixa", $remuneracao_fixa);
                $this->sql->bindParam(":nome_sup", $nome_sup);
                $this->sql->bindParam(":remuneracao_movel", $remuneracao_movel);
                $this->sql->bindParam(":prestadora_sup", $prestadora_sup);
                $this->sql->bindParam(":data_comunicacao", $data_comunicacao);
                $this->sql->bindParam(":tipo_servico", $tipo_servico);

                $this->sql->execute();

                return "Dados inseridos com sucesso!";
            
            } catch (PDOException $e){

                return "Erro ao inserir os dados: {$e->getMessage()}.";

            }
            
        }

    }

?>