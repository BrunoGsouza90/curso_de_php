<?php

    // Arquivo para manipulação dos produtos no Banco de Dados.

    include_once 'config/database.php';
    include_once 'controllers/validacoes.php';
    include_once 'helpers/interfaces.php';

    // Classe de manipulação dos produtos no Banco de Dados.
    class Produtos extends ConexaoBanco implements interfaceProduto{

        private $id;
        private $nome;
        private $descricao;
        private $codigo_barras;
        private $preco_compra;
        private $preco_venda;
        private $quantidade_estoque;
        private $unidade_medida;
        private $ativo;
        private $id_categoria;

        private $sql;

        public $mensagens = [

            "sucesso" => [],
            "erro" => []

        ];

        private $produto;
        private $produtos;

        function __construct($id = null, $nome = null, $descricao = null, $codigo_barras = null, $preco_compra = null, $preco_venda = null, $quantidade_estoque = null, $unidade_medida = null, $ativo = true, $id_categoria = null){

            echo 'ola';

            $this->set_id($id);
            $this->set_nome($nome);
            $this->set_descricao($descricao);
            $this->set_codigo_barras($codigo_barras);
            $this->set_preco_compra(floatval($preco_compra));
            $this->set_preco_venda(floatval($preco_venda));
            $this->set_quantidade_estoque($quantidade_estoque);
            $this->set_unidade_medida(floatval($unidade_medida));
            $this->set_ativo($ativo);
            $this->set_id_categoria($id_categoria);

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

        public function set_codigo_barras($codigo_barras){

            $this->codigo_barras = $codigo_barras;

        }

        public function get_codigo_barras(){

            return $this->codigo_barras;

        }

        public function set_preco_compra($preco_compra){

            $this->preco_compra = $preco_compra;

        }

        public function get_preco_compra(){

            return $this->preco_compra;

        }

        public function set_preco_venda($preco_venda){

            $this->preco_venda = $preco_venda;

        }

        public function get_preco_venda(){

            return $this->preco_venda;

        }

        public function set_quantidade_estoque($quantidade_estoque){

            $this->quantidade_estoque = $quantidade_estoque;

        }

        public function get_quantidade_estoque(){

            return $this->quantidade_estoque;

        }
        
        public function set_unidade_medida($unidade_medida){

            $this->unidade_medida = $unidade_medida;

        }

        public function get_unidade_medida(){

            return $this->unidade_medida;

        }

        public function set_ativo($ativo){

            $this->ativo = $ativo;

        }

        public function get_ativo(){

            return $this->ativo;

        }

        public function set_id_categoria($id_categoria){

            $this->id_categoria = $id_categoria;

        }

        public function get_id_categoria(){

            return $this->id_categoria;

        }

        public function set_produtos($produtos){

            $this->produtos[] = $produtos;

        }

        public function get_produtos(){

            return $this->produtos;

        }

        public function set_produto($produto){

            $this->produto = $produto;

        }

        public function get_produto(){

            return $this->produto;

        }

        public function set_sql($sql){

            $this->sql = $sql;

        }

        public function get_sql(){

            return $this->sql;

        }

        // ==============================================

        // Método responsável pela criação de produtos no Banco de Dados.
        public function criarProduto(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("INSERT INTO produtos (nome, descricao, codigo_barras, preco_compra, preco_venda, quantidade_estoque, unidade_medida, ativo, id_categoria) VALUES (:nome, :descricao, :codigo_barras, :preco_compra, :preco_venda, :quantidade_estoque, :unidade_medida, :ativo, :id_categoria)");

                $nome = $this->get_nome();
                $descricao = $this->get_descricao();
                $codigo_barras = $this->get_codigo_barras();
                $preco_compra = $this->get_preco_compra();
                $preco_venda = $this->get_preco_venda();
                $quantidade_estoque = $this->get_quantidade_estoque();
                $unidade_medida = $this->get_unidade_medida();
                $ativo = $this->get_ativo();
                $id_categoria = $this->get_id_categoria();

                $this->sql->bindParam(":nome", $nome);
                $this->sql->bindParam(":descricao", $descricao);
                $this->sql->bindParam(":codigo_barras", $codigo_barras);
                $this->sql->bindParam(":preco_compra", $preco_compra);
                $this->sql->bindParam(":preco_venda", $preco_venda);
                $this->sql->bindParam(":quantidade_estoque", $quantidade_estoque);
                $this->sql->bindParam(":unidade_medida", $unidade_medida);
                $this->sql->bindParam(":ativo", $ativo);
                $this->sql->bindParam(":id_categoria", $id_categoria);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Produto cadastrado com sucesso";

                return $this->mensagens;

            } catch(PDOException $e){

                $this->desconectarBanco();

                $erro = 'Erro ao cradastrar produto: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela edição de produtos no Banco de Dados.
        public function editarProduto(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("UPDATE produtos SET nome = :nome, descricao = :descricao, codigo_barras = :codigo_barras, preco_compra = :preco_compra, preco_venda = :preco_venda, quantidade_estoque = :quantidade_estoque, unidade_medida = :unidade_medida, ativo = :ativo, id_categoria = :id_categoria WHERE id = :id");

                $id = $this->get_id();
                $nome = $this->get_nome();
                $descricao = $this->get_descricao();
                $codigo_barras = $this->get_codigo_barras();
                $preco_compra = $this->get_preco_compra();
                $preco_venda = $this->get_preco_venda();
                $quantidade_estoque = $this->get_quantidade_estoque();
                $unidade_medida = $this->get_unidade_medida();
                $ativo = $this->get_ativo();
                $id_categoria = $this->get_id_categoria();

                $this->sql->bindParam("id", $id);
                $this->sql->bindParam(":nome", $nome);
                $this->sql->bindParam(":descricao", $descricao);
                $this->sql->bindParam(":codigo_barras", $codigo_barras);
                $this->sql->bindParam(":preco_compra", $preco_compra);
                $this->sql->bindParam(":preco_venda", $preco_venda);
                $this->sql->bindParam(":quantidade_estoque", $quantidade_estoque);
                $this->sql->bindParam(":unidade_medida", $unidade_medida);
                $this->sql->bindParam(":ativo", $ativo);
                $this->sql->bindParam(":id_categoria", $id_categoria);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Produto editado com sucesso";

                return $this->mensagens;

            } catch(PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao editar produto: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exclusão de produtos no Banco de Dados.
        public function excluirProduto(){

            try{

                $this->conectarBanco();

                $this->sql = $this->conn->prepare("DELETE FROM produtos WHERE id = :id");

                $id = $this->get_id();

                $this->sql->bindParam(":id", $id);

                $this->sql->execute();

                $this->desconectarBanco();

                $this->mensagens['sucesso'] = "Produto deletado com sucesso";

                header("Location:" . BASE_URL . '/listarProdutos.php');

            } catch(PDOException $e){

                $this->desconectarBanco();

                $this->mensagens['erro'] = 'Erro ao excluir produto: ' . $e->getMessage();

                return $this->mensagens;

            }

        }

        // Método responsável pela exibição de todos os produtos registrados no Banco de Dados.
        public function exibirProdutos(){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT * FROM produtos");

            $this->sql->execute();

            $produtos = $this->sql->fetchAll();

            $this->set_produtos($produtos);

            $this->desconectarBanco();

            return $this->get_produtos();

        }

        // Método responsável pela exibição de produtos específicos do Banco de Dados.
        public function exibirProduto($id){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT * FROM produtos WHERE id = :id");

            $this->sql->bindParam(":id", $id);

            $this->sql->execute();

            $produto = $this->sql->fetch();

            $this->set_produto($produto);

            $this->desconectarBanco();

            return $this->get_produto();

        }

        // Método responsável pela exibição das categorias respectivas de cada produto registrado no Banco de Dados.
        public function exibirProduto_categoria($id){

            $this->conectarBanco();

            $this->sql = $this->conn->prepare("SELECT produtos.nome as 'produto', categorias.nome as 'categoria', produtos.descricao as 'descricao', produtos.codigo_barras as 'codigo_barras', produtos.preco_compra as 'preco_compra', produtos.preco_venda as 'preco_venda', produtos.quantidade_estoque as 'quantidade_estoque', produtos.unidade_medida as 'unidade_medida', produtos.ativo as 'status' FROM produtos INNER JOIN categorias ON categorias.id = produtos.id_categoria WHERE categorias.id = :id");

            $this->sql->bindParam(":id", $id);

            $this->sql->execute();

            $produto = $this->sql->fetch();

            $this->set_produto($produto);

            $this->desconectarBanco();

            return $this->get_produto();

        }

    }

?>