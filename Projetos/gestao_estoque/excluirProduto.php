<?php

    include_once 'config/verificacao.php';
    include_once 'controllers/validacaoProduto.php';

    $produto = new ValidacaoProduto($_POST['id'], $_POST['type']);
    $produto->manage();

?>