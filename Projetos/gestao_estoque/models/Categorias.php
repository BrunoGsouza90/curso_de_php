<?php

    // Arquivo para manipulação das categorias no Banco de Dados.

    include_once 'config/database.php';
    include_once 'controllers/validacoes.php';
    include_once 'helpers/interfaces.php';

    // Classe de manipulação das categorias no Banco de Dados.
    class Categorias extends ConexaoBanco implements interfaceCategoria{

        private $id;
        private $nome;
        private $descricao;

        private $sql;

        public $mensagens = [

            "sucesso" => [],
            "erro" => []

        ];

        private $categoria;
        private $categorias;

        function __construct($id = null, $nome = null, $descricao = null){

            $this->set_id($id);
            $this->set_nome($nome);
            $this->set_descricao($descricao);

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

        public function set_descricao($descricao){

            $this->descricao = $descricao;

        }

        public function get_descricao(){

            return $this->descricao;

        }

        public function set_categorias($categorias){

            $this->categorias[] = $categorias;

        }

        public function get_categorias(){

            return $this->categorias;

        }

        public function set_categoria($categoria){

            $this->categoria = $categoria;

        }

        public function get_categoria(){

            return $this->categoria;

        }

        public function set_sql($sql){

            $this->sql = $sql;

        }

        public function get_sql(){

            return $this->sql;

        }

        // ==============================================

        // Método responsável pela criação de categorias no Banco de Dados.
        public function criarCategoria(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("INSERT categorias (nome, descricao) VALUES (:nome, :descricao)");

                $nome = $this->get_nome();
                $descricao = $this->get_descricao();

                $this->sql->bindParam(":nome", $nome);
                $this->sql->bindParam(":descricao", $descricao);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Categoria cadastrada com sucesso";

                return $this->mensagens;

            } catch (PDOException $e){

                $this->desconectarBanco();

                $this->desconectarBanco();

                $erro = 'Erro ao cradastrar categoria: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela edição de categorias no Banco de Dados.
        public function editarCategoria(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("UPDATE categorias SET nome = :nome, descricao = :descricao WHERE id = :id");

                $id = $this->get_id();
                $nome = $this->get_nome();
                $descricao = $this->get_descricao();

                $this->sql->bindParam(":id", $id);
                $this->sql->bindParam(":nome", $nome);
                $this->sql->bindParam(":descricao", $descricao);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Categoria editada com sucesso";

                return $this->mensagens;

            } catch(PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao editar categoria: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exclusão de categorias no Banco de Dados.
        public function excluirCategoria(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("DELETE FROM categorias WHERE id = :id");

                $id = $this->get_id();

                $this->sql->bindParam(":id", $id);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Categoria deletada com sucesso";

                header("Location:" . BASE_URL . '/listarCategorias.php');

            } catch(PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao excluir categoria: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exibição de todas as categorias registradas no Banco de Dados.
        public function exibirCategorias(){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT * FROM categorias");

            $this->sql->execute();

            $categorias = $this->sql->fetchAll();

            $this->set_categorias($categorias);

            $this->desconectarBanco();

            return $this->get_categorias();

        }

        // Método responsável pela exibição de categorias específicas do Banco de Dados.
        public function exibirCategoria($id){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT * FROM categorias WHERE id = :id");

            $this->sql->bindParam(":id", $id);

            $this->sql->execute();

            $categoria = $this->sql->fetch();

            $this->set_categoria($categoria);

            $this->desconectarBanco();

            return $this->get_categoria();

        }

    }

?>