<?php

    include_once 'config/constantes.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/static/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestão de Estoque</title>
</head>
<body>

    <div id="container">

        <header>

            <nav>

                <ul>

                    <li>

                        <button><a href="<?= BASE_URL ?>/logout.php">Logout</a></button>

                        </li>

                    <li>

                        <a href="<?= BASE_URL ?>/home.php">Home</a>

                    </li>

                    <li>

                        <a href="<?= BASE_URL ?>/listarClientes.php">Clientes</a>

                    </li>

                    <li>

                        <a href="<?= BASE_URL ?>/listarFornecedores.php">Fornecedores</a>

                    </li>

                    <li>

                        <a href="<?= BASE_URL ?>/listarCategorias.php">Categorias</a>

                        </li>

                    <li>

                        <a href="<?= BASE_URL ?>/listarProdutos.php">Produtos</a>

                    </li>

                </ul>

            </nav>

        </header>