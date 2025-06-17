<?php

    // Arquivo de interfaces para as classes da aplicação.

    // Interfaces das models.
    interface interfaceClientes{

        public function criarCliente();
        public function editarCliente();
        public function excluirCliente();
        public function exibirClientes();
        public function exibirCliente($id);
        public function estados();
        public function regioes();

    }

    interface interfaceFornecedor{

        public function criarFornecedor();
        public function editarFornecedor();
        public function excluirFornecedor();
        public function exibirFornecedores();
        public function exibirFornecedor($id);
        public function estados();
        public function regioes();

    }

    interface interfaceProduto{

        public function criarProduto();
        public function editarProduto();
        public function excluirProduto();
        public function exibirProdutos();
        public function exibirProduto($id);
        public function exibirProduto_categoria($id);

    }

    interface interfaceCategoria{

        public function criarCategoria();
        public function editarCategoria();
        public function excluirCategoria();
        public function exibirCategorias();
        public function exibirCategoria($id);

    }

    interface interfaceUsuario{



    }

    interface interfaceMovimentacao{



    }

    interface interfaceVenda{

        

    }

    interface interafaceEntrada{



    }

    // Interfaces de validação.
    interface interfaceValidarCliente{

        public function validarRazaosocial();
        public function validar_Cnpj_cpf();
        public function validarRua();
        public function validarNumero();
        public function validarBairro();
        public function validarCep();
        public function validarTelefone();
        public function validarEmail();
        public function validarProfissao();

    }

    interface interfaceValidarFornecedor{

        public function validarRazaosocial();
        public function validar_Cnpj_cpf();
        public function validarRua();
        public function validarNumero();
        public function validarBairro();
        public function validarCep();
        public function validarTelefone();
        public function validarEmail();
        public function validarIns_estadual();
        public function validarIns_municipal();
        public function validarProduto_servico();

    }

    interface interfaceValidarCategoria{

        public function validarNome();
        public function validarDescricao();

    }

    interface interfaceValidarProduto{

        public function validarNome();
        public function validarDescricao();
        public function validarCodigo_barras();
        public function validarPreco_compra();
        public function validarPreco_venda();
        public function validarQuantidade_estoque();
        public function validarUnidade_medida();

    }

?>