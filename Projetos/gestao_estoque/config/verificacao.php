<?php

    // Arquivo de proteção para entrada de usuários na aplicação.

    include_once 'config/constantes.php';

    // Função responsável por verificar se há alguma sessão aberta. Se não houver a sessão é aberta.
    if(!isset($_SESSION)){

        session_start();

    }

    // Função responsável por verificar se há algum usuário logado.
    if(!isset($_SESSION['user'])){

        header("Location: " . BASE_URL . "/login.php");

    }

?>