<?php

    // Arquivo para manipulação dos fornecedores no Banco de Dados.

    include_once 'helpers/abstracts.php';
    include_once 'helpers/interfaces.php';
    include_once 'controllers/validacoes.php';

    // Classe de manipulação dos fornecedores no Banco de Dados.
    class Fornecedores extends StakeHolders implements interfaceFornecedor{

        private $ins_estadual;
        private $ins_municipal;
        private $produto_servico;

        private $sql;

        private $fornecedor;
        private $fornecedores;

        public function __construct($id = null, $razaosocial = null, $cnpj_cpf = null, $rua = null, $numero = null, $bairro = null, $cep = null, $estado = null, $telefone = null, $email = null, $ins_estadual = null, $ins_municipal = null, $produto_servico = null){

            $this->set_id($id);
            $this->set_razaosocial($razaosocial);
            $this->set_cnpj_cpf($cnpj_cpf);
            $this->set_rua($rua);
            $this->set_numero($numero);
            $this->set_bairro($bairro);
            $this->set_cep($cep);
            $this->set_estado($estado);
            $this->set_telefone($telefone);
            $this->set_email($email);
            $this->set_ins_estadual($ins_estadual);
            $this->set_ins_municipal($ins_municipal);
            $this->set_produto_servico($produto_servico);

        }

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

        public function set_fornecedores($fornecedores){

            $this->fornecedores[] = $fornecedores;

        }

        public function get_fornecedores(){

            return $this->fornecedores;

        }

        public function set_fornecedor($fornecedor){

            $this->fornecedor = $fornecedor;

        }

        public function get_fornecedor(){

            return $this->fornecedor;

        }

        // ==============================================

        // Método responsável pela criação de fornecedores no Banco de Dados.
        public function criarFornecedor(){

            try{

                $this->conectarBanco();
        
                $this->sql = $this->conn->prepare("INSERT INTO fornecedores (razaosocial, cnpj_cpf, rua, numero, bairro, cep, estado, telefone, email, ins_estadual, ins_municipal, produto_servico) VALUES (:razaosocial, :cnpj_cpf, :rua, :numero, :bairro, :cep, :estado, :telefone, :email, :ins_estadual, :ins_municipal, :produto_servico)");

                $razaosocial = $this->get_razaosocial();
                $cnpj_cpf = $this->get_cnpj_cpf();
                $rua = $this->get_rua();
                $numero = $this->get_numero();
                $bairro = $this->get_bairro();
                $cep = $this->get_cep();
                $estado = $this->get_estado();
                $telefone = $this->get_telefone();
                $email = $this->get_email();
                $ins_municipal = $this->get_ins_estadual();
                $ins_estadual = $this->get_ins_municipal();
                $produto_servico = $this->get_produto_servico();
        
                $this->sql->bindParam(":razaosocial", $razaosocial);
                $this->sql->bindParam(":cnpj_cpf", $cnpj_cpf);
                $this->sql->bindParam(":rua", $rua);
                $this->sql->bindParam(":numero", $numero);
                $this->sql->bindParam(":bairro", $bairro);
                $this->sql->bindParam(":cep", $cep);
                $this->sql->bindParam(":estado", $estado);
                $this->sql->bindParam(":telefone", $telefone);
                $this->sql->bindParam(":email", $email);
                $this->sql->bindParam(":ins_estadual", $ins_estadual);
                $this->sql->bindParam(":ins_municipal", $ins_municipal);
                $this->sql->bindParam(":produto_servico", $produto_servico);

                $this->sql->execute();
        
                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Fornecedor cadastrado com sucesso";

                return $this->mensagens;

            }catch (PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao cadastrar fornecedor: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela edição de Fornecedores no Banco de Dados.
        public function editarFornecedor(){

            try {
                $this->conectarBanco();
        
                $this->sql = $this->conn->prepare("UPDATE fornecedores SET razaosocial = :razaosocial, cnpj_cpf = :cnpj_cpf, rua = :rua, numero = :numero, bairro = :bairro, cep = :cep, estado = :estado, telefone = :telefone, email = :email, ins_estadual = :ins_estadual, ins_municipal = :ins_municipal, produto_servico = :produto_servico WHERE id = :id");

                $id = $this->get_id();
                $razaosocial = $this->get_razaosocial();
                $cnpj_cpf = $this->get_cnpj_cpf();
                $rua = $this->get_rua();
                $numero = $this->get_numero();
                $bairro = $this->get_bairro();
                $cep = $this->get_cep();
                $estado = $this->get_estado();
                $telefone = $this->get_telefone();
                $email = $this->get_email();
                $ins_estadual = $this->get_ins_estadual();
                $ins_municipal = $this->get_ins_municipal();
                $produto_servico = $this->get_produto_servico();
        
                $this->sql->bindParam(":id", $id);
                $this->sql->bindParam(":razaosocial", $razaosocial);
                $this->sql->bindParam(":cnpj_cpf", $cnpj_cpf);
                $this->sql->bindParam(":rua", $rua);
                $this->sql->bindParam(":numero", $numero);
                $this->sql->bindParam(":bairro", $bairro);
                $this->sql->bindParam(":cep", $cep);
                $this->sql->bindParam(":estado", $estado);
                $this->sql->bindParam(":telefone", $telefone);
                $this->sql->bindParam(":email", $email);
                $this->sql->bindParam(":ins_estadual", $ins_estadual);
                $this->sql->bindParam(":ins_municipal", $ins_municipal);
                $this->sql->bindParam(":produto_servico", $produto_servico);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Fornecedor editado com sucesso";

                return $this->mensagens;

            }catch (PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro']= 'Erro ao editar fornecedor: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exclusão de Fornecedores no Banco de Dados.
        public function excluirFornecedor(){

            try {
                $this->conectarBanco();
        
                $this->sql = $this->conn->prepare("DELETE FROM fornecedores WHERE id = :id");

                $id = $this->get_id();
        
                $this->sql->bindParam(":id", $id);

                $this->sql->execute();

                echo 'ola';
                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Fornecedor deletado com sucesso";

                header("Location:" . BASE_URL . '/listarFornecedores.php');

                return $this->mensagens;

            }catch (PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao excluir fornecedor: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exibição de todos os fornecedores registrados no Banco de Dados.
        public function exibirFornecedores(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("SELECT * FROM fornecedores");

                $this->sql->execute();

                $fornecedores = $this->sql->fetchAll();

                $this->set_fornecedores($fornecedores);

                $this->desconectarBanco();

                return $this->get_fornecedores();

            } catch(PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao exibir fornecedores: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exibição de fornecedores específicos do Banco de Dados.
        public function exibirFornecedor($id){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT * FROM fornecedores WHERE id = :id");

            $this->sql->bindParam(":id", $id);

            $this->sql->execute();

            $fornecedor = $this->sql->fetch();

            $this->set_fornecedor($fornecedor);

            $this->desconectarBanco();

            return $this->get_fornecedor();

        }

        // Método responsável pela exibição dos estados cadastrados no Banco de Dados.
        public function estados(){

            $this->conectarBanco();

            $this->sql = $this->conn->query("SELECT * FROM estados");

            return $this->sql;

        }

        // Método responsável pela exibição das regiões cadastradas no Banco de Dados.
        public function regioes(){

            $this->conectarBanco();

            $this->sql = $this->conn->query("SELECT * FROM regioes");

            return $this->sql;

        }

    }

?>