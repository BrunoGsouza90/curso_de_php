<?php

    include_once 'config/verificacao.php';
    include_once 'controllers/validacaoCliente.php';

    $cliente = new ValidacaoCliente($_POST['id'], $_POST['type']);
    $cliente->manage();

?>