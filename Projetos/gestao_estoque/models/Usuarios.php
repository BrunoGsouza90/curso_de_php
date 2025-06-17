<?php

    // Arquivo para manipulação de usuários no Banco de Dados.

    include_once 'config/database.php';
    include_once 'config/constantes.php';

    // Classe de manipulação dos usuários no Banco de Dados.
    class Usuarios extends ConexaoBanco{

        private $id;
        private $nome;
        private $email;
        private $senha;
        private $nivel_de_acesso;
        private $ativo;

        private $sql;

        public $mensagens = [

            "sucesso" => [],
            "erro" => []

        ];

        private $usuario;
        private $usuarios;

        function __construct($id = null, $nome = null, $email = null, $senha = null, $nivel_de_acesso = null, $ativo = null){

            $this->set_id($id);
            $this->set_nome($nome);
            $this->set_email($email);
            $this->set_senha($senha);
            $this->set_nivel_de_acesso($nivel_de_acesso);
            $this->set_ativo($ativo);

        }

        public function set_id($id){

            $this->id = $id;

        }

        public function get_id(){

            return $this->id;

        }

        public function set_nome($nome){

            $this->nome = $nome;

        }

        public function get_nome(){

            return $this->nome;

        }

        public function set_email($email){

            $this->email = $email;

        }

        public function get_email(){

            return $this->email;

        }

        public function set_senha($senha){

            $this->senha = $senha;

        }

        public function get_senha(){

            return $this->senha;

        }

        public function set_nivel_de_acesso($nivel_de_acesso){

            $this->nivel_de_acesso = $nivel_de_acesso;

        }

        public function get_nivel_de_acesso(){

            return $this->nivel_de_acesso;

        }

        public function set_ativo($ativo){

            $this->ativo = $ativo;

        }

        public function get_ativo(){

            return $this->ativo;

        }

        public function set_usuarios($usuarios){

            $this->usuarios[] = $usuarios;

        }

        public function get_usuarios(){

            return $this->usuarios;

        }

        public function set_usuario($usuario){

            $this->usuario = $usuario;

        }

        public function get_usuario(){

            return $this->usuario;

        }

        public function set_sql($sql){

            $this->sql = $sql;

        }

        public function get_sql(){

            return $this->sql;

        }

        // ==============================================

        // Método responsável pela criação de usuários no Banco de Dados.
        public function criarUsuario(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("INSERT usuarios (nome, email, senha, nivel_de_acesso, ativo) VALUES (:nome, :email, :senha, :nivel_de_acesso, :ativo)");

                $nome = $this->get_nome();
                $email = $this->get_email();
                $senha = $this->get_senha();
                $senha = password_hash($senha, PASSWORD_DEFAULT);
                $nivel_de_acesso = $this->get_nivel_de_acesso();
                $ativo = $this->get_ativo();

                $this->sql->bindParam(":nome", $nome);
                $this->sql->bindParam(":email", $email);
                $this->sql->bindParam(":senha", $senha);
                $this->sql->bindParam(":nivel_de_acesso", $nivel_de_acesso);
                $this->sql->bindParam(":ativo", $ativo);

                $this->sql->execute();

                $this->desconectarBanco();

            } catch (PDOException $e){

                $this->desconectarBanco();

                $erro = 'Erro ao cradastrar usuário: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela edição de usuários no Banco de Dados.
        public function editarUsuario(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, nivel_de_acesso = :nivel_de_acesso, ativo = :ativo WHERE id = :id");

                $id = $this->get_id();
                $nome = $this->get_nome();
                $email = $this->get_email();
                $senha = $this->get_senha();
                $senha = password_hash($senha, PASSWORD_DEFAULT);
                $nivel_de_acesso = $this->get_nivel_de_acesso();
                $ativo = $this->get_ativo();

                $this->sql->bindParam(":id", $id);
                $this->sql->bindParam(":nome", $nome);
                $this->sql->bindParam(":email", $email);
                $this->sql->bindParam(":senha", $senha);
                $this->sql->bindParam(":nivel_de_acesso", $nivel_de_acesso);
                $this->sql->bindParam(":ativo", $ativo);

                $this->sql->execute();

                $this->desconectarBanco();

                header("Location: " . BASE_URL . "/listarClientes.php");

            } catch(PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao editar usuário: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exclusão de usuários no Banco de Dados.
        public function excluirUsuario(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("DELETE FROM usuarios WHERE id = :id");

                $id = $this->get_id();

                $this->sql->bindParam(":id", $id);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Usuário deletado com sucesso";

                header("Location:" . BASE_URL . '/listarUsuarios.php');

            } catch(PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao excluir usuário: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exibição de todos os usuários registros no Banco de Dados.
        public function exibirUsuarios(){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT * FROM usuarios");

            $this->sql->execute();

            $usuarios = $this->sql->fetchAll();

            $this->set_usuarios($usuarios);

            $this->desconectarBanco();

            return $this->get_usuarios();

        }

        // Método responsável pela exibição de usuários específicos do Banco de Dados.
        public function exibirUsuario($id){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT * FROM usuarios WHERE id = :id");

            $this->sql->bindParam(":id", $id);

            $this->sql->execute();

            $usuario = $this->sql->fetch();

            $this->set_usuario($usuario);

            $this->desconectarBanco();

            return $this->get_usuario();

        }

    }

?>