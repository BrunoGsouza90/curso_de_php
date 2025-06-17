<?php

    if(!isset($_SESSION)){

        session_start();

    }

    if(!isset($_SESSION['user'])){

        die("<p>Você não pode acessar essa página! Porque não está logado!</p>");

    }

?>