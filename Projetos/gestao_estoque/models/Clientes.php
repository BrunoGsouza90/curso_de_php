<?php

    // Arquivo para manipulação dos clientes no Banco de Dados.

    include_once 'helpers/abstracts.php';
    include_once 'helpers/interfaces.php';

    // Classe de manipulação dos clientes no Banco de Dados.
    class Clientes extends StakeHolders implements interfaceClientes{

        private $nascimento;
        private $profissao;
        private $sexo;

        private $sql;

        private $cliente;
        private $clientes;

        function __construct($id = null, $razaosocial = null, $cnpj_cpf = null, $rua = null, $numero = null, $bairro = null, $cep = null, $estado = null, $telefone = null, $email = null, $nascimento = null, $profissao = null, $sexo = null){

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
            $this->set_nascimento($nascimento);
            $this->set_profissao($profissao);
            $this->set_sexo($sexo);
            
        }

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

        public function set_clientes($clientes){

            $this->clientes[] = $clientes;

        }

        public function get_clientes(){

            return $this->clientes;

        }

        public function set_cliente($cliente){

            $this->cliente = $cliente;

        }

        public function get_cliente(){

            return $this->cliente;

        }

        // ==============================================

        // Método responsável pela criação de clientes no Banco de Dados.
        public function criarCliente(){

            try{

                $this->conectarBanco();
        
                $this->sql = $this->conn->prepare("INSERT INTO clientes (razaosocial, cnpj_cpf, rua, numero, bairro, cep, estado, telefone, email, nascimento, profissao, sexo) VALUES (:razaosocial, :cnpj_cpf, :rua, :numero, :bairro, :cep, :estado, :telefone, :email, :nascimento, :profissao, :sexo)");

                $razaosocial = $this->get_razaosocial();
                $cnpj_cpf = $this->get_cnpj_cpf();
                $rua = $this->get_rua();
                $numero = $this->get_numero();
                $bairro = $this->get_bairro();
                $cep = $this->get_cep();
                $estado = $this->get_estado();
                $telefone = $this->get_telefone();
                $email = $this->get_email();
                $nascimento = $this->get_nascimento();
                $profissao = $this->get_profissao();
                $sexo = $this->get_sexo();

                $this->sql->bindParam(":razaosocial", $razaosocial);
                $this->sql->bindParam(":cnpj_cpf", $cnpj_cpf);
                $this->sql->bindParam(":rua", $rua);
                $this->sql->bindParam(":numero", $numero);
                $this->sql->bindParam(":bairro", $bairro);
                $this->sql->bindParam(":cep", $cep);
                $this->sql->bindParam(":estado", $estado);
                $this->sql->bindParam(":telefone", $telefone);
                $this->sql->bindParam(":email", $email);
                $this->sql->bindParam(":nascimento", $nascimento);
                $this->sql->bindParam(":profissao", $profissao);
                $this->sql->bindParam(":sexo", $sexo);

                $this->sql->execute();
        
                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Cliente cadastrado com sucesso";

                return $this->mensagens;

            }catch (PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao cadastrar cliente: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela edição de Clientes no Banco de Dados.
        public function editarCliente(){

            try{

                $this->conectarBanco();

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
                $nascimento = $this->get_nascimento();
                $profissao = $this->get_profissao();
                $sexo = $this->get_sexo();
        
                $this->sql = $this->conn->prepare("UPDATE clientes SET razaosocial = :razaosocial, cnpj_cpf = :cnpj_cpf, rua = :rua, numero = :numero, bairro = :bairro, cep = :cep, estado = :estado, telefone = :telefone, email = :email, nascimento = :nascimento, profissao = :profissao, sexo = :sexo WHERE id = :id");
        
                $this->sql->bindValue(":id", $id);
                $this->sql->bindValue(":razaosocial", $razaosocial);
                $this->sql->bindValue(":cnpj_cpf", $cnpj_cpf);
                $this->sql->bindValue(":rua", $rua);
                $this->sql->bindValue(":numero", $numero);
                $this->sql->bindValue(":bairro", $bairro);
                $this->sql->bindValue(":cep", $cep);
                $this->sql->bindValue(":estado", $estado);
                $this->sql->bindValue(":telefone", $telefone);
                $this->sql->bindValue(":email", $email);
                $this->sql->bindValue(":nascimento", $nascimento);
                $this->sql->bindValue(":profissao", $profissao);
                $this->sql->bindValue(":sexo", $sexo);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Cliente editado com sucesso";

                return $this->mensagens;

            } catch (PDOException $e){
                
                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao editar cliente: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exclusão de Clientes no Banco de Dados.
        public function excluirCliente(){

            try{
                $this->conectarBanco();
        
                $this->sql = $this->conn->prepare("DELETE FROM clientes WHERE id = :id");

                $id = $this->get_id();
        
                $this->sql->bindParam(":id", $id);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Cliente deletado com sucesso";

                header("Location:" . BASE_URL . '/listarClientes.php');

                return $this->mensagens;

            }catch (PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao excluir fornecedor: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exibição de todos os clientes registrados no Banco de Dados.
        public function exibirClientes(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("SELECT * FROM clientes");

                $this->sql->execute();

                $clientes = $this->sql->fetchAll();

                $this->set_clientes($clientes);

                $this->desconectarBanco();

                return $this->get_clientes();

            } catch(PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao exibir clientes: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exibição de clientes específicos do Banco de Dados.
        public function exibirCliente($id){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT * FROM clientes WHERE id = :id");

            $this->sql->bindParam(":id", $id);

            $this->sql->execute();

            $cliente = $this->sql->fetch();

            $this->set_cliente($cliente);

            $this->desconectarBanco();

            return $this->get_cliente();

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