<?php

    // Arquivo para validação de produtos.

    include_once 'config/constantes.php';
    include_once 'models/Produtos.php';
    include_once 'helpers/interfaces.php';

    // Classe responsável pela validação dos produtos vindos do formulário.
    class ValidacaoProduto extends ConexaoBanco implements interfaceValidarProduto{

        private $id;
        private $type;
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

            'sucesso' => [],
            'erro' => []

        ];

        function __construct($id = null, $type = null, $nome = null, $descricao = null, $codigo_barras = null, $preco_compra = null, $preco_venda = null, $quantidade_estoque = null, $unidade_medida = null, $ativo = null, $id_categoria = null){

            $this->set_id($id);
            $this->set_type($type);
            $this->set_nome($nome);
            $this->set_descricao($descricao);
            $this->set_codigo_barras($codigo_barras);
            $this->set_preco_compra($preco_compra);
            $this->set_preco_venda($preco_venda);
            $this->set_quantidade_estoque($quantidade_estoque);
            $this->set_unidade_medida($unidade_medida);
            $this->set_ativo($ativo);
            $this->set_id_categoria($id_categoria);

        }

        public function set_id($id){

            $this->id = $id;

        }

        public function get_id(){

            return $this->id;

        }

        public function set_type($type){

            $this->type = $type;

        }

        public function get_type(){

            return $this->type;

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

        public function set_sql($sql){

            $this->sql = $sql;

        }

        public function get_sql(){

            return $this->sql;

        }

        // ==============================================

        // Métodos responsáveis pela validação dos campos vindos do formulário.

        public function validarNome(){

            if($this->get_type() == 'create'){
                    
                $this->conectarBanco();

                $this->set_sql($this->conn->prepare("SELECT * FROM produtos WHERE nome = :nome"));

                $nome = $this->get_nome();

                $this->get_sql()->bindParam('nome', $nome);

                $this->get_sql()->execute();

                $produtos = $this->get_sql()->fetch(PDO::FETCH_ASSOC);

                if(!empty($produtos)){

                    $erro = 'Produto já cadastrado no sistema!';

                    array_push($this->mensagens['erro'], $erro);

                }

                $this->desconectarBanco();

            }

            if(empty($this->get_nome())){

                $erro = 'O campo "Nome" é obrigatório!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strlen($this->get_nome()) > 45){

                $erro = 'O campo "Nome" é muito longo!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validarDescricao(){

            if(empty($this->get_descricao())){

                $erro = 'O campo "Descricão" é obrigatório!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validarCodigo_barras(){

            if(strpbrk($this->get_codigo_barras(), CARACTERES_ESPECIAS_EMAIL)){

                $erro = 'O campo "Código de barras" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_codigo_barras(), ALFABETO)){

                $erro = 'O campo "Código de barras" não aceita letras!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strlen($this->get_codigo_barras() > 14)){

                $erro = 'O campo "Código de barras" tem o tamanho inválido!';

                array_push($this->mensagens['erro'], $erro);

            }
            
        }

        public function validarPreco_compra(){

            if(empty($this->get_preco_compra())){

                $erro = 'O campo "Preço da compra" é obrigatório!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_preco_compra(), ALFABETO)){

                $erro = 'O campo "Preço da compra" não aceita letras!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_preco_compra(), CARACTERES_ESPECIAS_EMAIL)){

                $erro = 'O campo "Preço da compra" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }


        }

        public function validarPreco_venda(){

            if(empty($this->get_preco_venda())){

                $erro = 'O campo "Preço da venda" é obrigatório!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_preco_venda(), ALFABETO)){

                $erro = 'O campo "Preço da venda" não aceita letras!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_preco_venda(), CARACTERES_ESPECIAS_EMAIL)){

                $erro = 'O campo "Preço da venda" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validarQuantidade_estoque(){
            
            if(empty($this->get_quantidade_estoque())){

                $erro = 'O campo "Quantidade de estoque" é obrigatório!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_quantidade_estoque(), ALFABETO)){

                $erro = 'O campo "Quantidade de estoque" não aceita letras!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_quantidade_estoque(), CARACTERES_ESPECIAS_EMAIL)){

                $erro = 'O campo "Quantidade de estoque" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }
            
        }

        public function validarUnidade_medida(){

            if(empty($this->get_unidade_medida())){

                $erro = 'O campo "Unidade de medida" é obrigatório!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_unidade_medida(), ALFABETO)){

                $erro = 'O campo "Unidade de medida" não aceita letras!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_unidade_medida(), CARACTERES_ESPECIAS_EMAIL)){

                $erro = 'O campo "Unidade de medida" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        // ==============================================

        // Método responsável pela chamada das avaliações dos campos do formulário e chamada dos objetos de manipulação no Banco de Dados.
        public function manage(){

            if($this->get_type() == 'create' || $this->get_type() == 'edit'){
                
                $this->validarNome();
                $this->validarDescricao();
                $this->validarCodigo_barras();
                $this->validarPreco_compra();
                $this->validarPreco_venda();
                $this->validarQuantidade_estoque();
                $this->validarUnidade_medida();

            }

            if($this->mensagens['erro'] == null){

                if($this->get_type() == 'create' || $this->get_type() == 'edit'){
                    
                    $nome = $this->get_nome();
                    $descricao = $this->get_descricao();
                    $codigo_barras = $this->get_codigo_barras();
                    $preco_compra = $this->get_preco_compra();
                    $preco_venda = $this->get_preco_venda();
                    $quantidade_estoque = $this->get_quantidade_estoque();
                    $unidade_medida = $this->get_unidade_medida();
                    $ativo = $this->get_ativo();
                    $id_categoria = $this->get_id_categoria();

                    if($this->get_type() == 'create'){

                        $novo_produto = new Produtos(null, $nome, $descricao, $codigo_barras, $preco_compra, $preco_venda, $quantidade_estoque, $unidade_medida, $ativo, $id_categoria);
    
                        $mensagens = $novo_produto->criarProduto();
    
                    } else if ($this->get_type() == 'edit'){

                        $id = $this->get_id();
    
                        $editar_produto = new Produtos($id, $nome, $descricao, $codigo_barras, $preco_compra, $preco_venda, $quantidade_estoque, $unidade_medida, $ativo, $id_categoria);
    
                        $mensagens = $editar_produto->editarProduto();
    
                    }

                } else if($this->get_type() == 'delete') {

                    $id = $this->get_id();

                    $excluir_produto = new Produtos($id);

                    $mensagens = $excluir_produto->excluirProduto();

                }

                array_push($this->mensagens['sucesso'], $mensagens['sucesso']);
                array_push($this->mensagens['erro'], $mensagens['erro']);

            }

        }

  }

?>