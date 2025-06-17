<?php

    include_once 'config/verificacao.php';
    include_once 'controllers/validacaoCategoria.php';

    $categoria = new ValidacaoCategoria($_POST['id'], $_POST['type']);
    $categoria->manage();

?>