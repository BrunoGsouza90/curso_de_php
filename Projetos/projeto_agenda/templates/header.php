<?php

    include_once 'helpers/url.php';
    include_once 'config/conexao.php';
    include_once 'config/processamento.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/static/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <title>Projeto Agenda</title>

</head>
<body>
    
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

            <a class="navbar-brand" href="<?= $BASE_URL ?>/index.php">

                <img src="<?= $BASE_URL ?>/static/img/logo.svg" alt="logo.svg">

            </a>


            <div class="navbar-nav p-2">
                
                <a href="<?= $BASE_URL ?>/index.php" class="nav-link active" id="home-link">Agenda</a>

                <a href="<?= $BASE_URL ?>/create.php" class="nav-link active" id="home-link">Adicionar Contato</a>

            </div>

        </nav>

    </header>