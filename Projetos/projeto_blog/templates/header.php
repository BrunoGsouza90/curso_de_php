<?php

    include_once 'helpers/url.php';
    include_once 'data/posts.php';
    include_once 'data/categorias.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?= $BASE_URL ?>/static/css/style.css">
    <title>Projeto Blog</title>
</head>
<body>
    
    <header>

        <a href="<?= $BASE_URL ?>" id="logo">

            <img src="<?= $BASE_URL ?>/static/img/logo.svg" alt="logo.svg">

        </a>

        <nav>

            <ul id="navbar">

                <li><a href="<?= $BASE_URL ?>">Página Inicial</a></li>
                <li><a href="#">Categorias</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="<?= $BASE_URL ?>/contato.php">Contato</a></li>

            </ul>

        </nav>

    </header>