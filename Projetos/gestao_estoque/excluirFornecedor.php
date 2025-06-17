<?php

    include_once 'config/verificacao.php';
    include_once 'controllers/validacaoFornecedor.php';

    $fornecedor = new ValidacaoFornecedor($_POST['id'], $_POST['type']);
    $fornecedor->manage();

?>