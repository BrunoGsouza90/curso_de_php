<?php

    // Arquivo para validação de categorias de produtos.

    include_once 'config/constantes.php';
    include_once 'models/Categorias.php';
    include_once 'helpers/interfaces.php';

    // Classe responsável pela validação das categorias de produtos vindas do formulário.
    class ValidacaoCategoria extends ConexaoBanco implements interfaceValidarCategoria{

        private $id;
        private $type;
        private $nome;
        private $descricao;

        public $mensagens = [

            'sucesso' => [],
            'erro' => []

        ];

        function __construct($id = null, $type = null, $nome = null, $descricao = null){

            $this->set_id($id);
            $this->set_type($type);
            $this->set_nome($nome);
            $this->set_descricao($descricao);

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

        // ==============================================

        // Métodos responsáveis pela validação dos campos vindos do formulário.

        public function validarNome(){

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

        // ==============================================

        // Método responsável pela chamada das avaliações dos campos do formulário e chamada dos objetos de manipulação no Banco de Dados.
        public function manage(){

            if($this->get_type() == 'create' || $this->get_type() == 'edit'){
                
                $this->validarNome();
                $this->validarDescricao();

            }

            if($this->mensagens['erro'] == null){

                if($this->get_type() == 'create' || $this->get_type() == 'edit'){
                    
                    $nome = $this->get_nome();
                    $descricao = $this->get_descricao();

                    if($this->get_type() == 'create'){

                        $nova_categoria = new Categorias(null, $nome, $descricao);
    
                        $mensagens = $nova_categoria->criarCategoria();
    
                    } else if ($this->get_type() == 'edit'){

                        $id = $this->get_id();
    
                        $editar_categoria = new Categorias($id, $nome, $descricao);
    
                        $mensagens = $editar_categoria->editarCategoria();
    
                    }

                } else if($this->get_type() == 'delete') {

                    $id = $this->get_id();

                    $excluir_categoria = new Categorias($id);

                    $mensagens = $excluir_categoria->excluirCategoria();

                }

                array_push($this->mensagens['sucesso'], $mensagens['sucesso']);
                array_push($this->mensagens['erro'], $mensagens['erro']);

            }

        }
        
  }

?>