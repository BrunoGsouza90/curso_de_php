<?php

    include_once 'config/constantes.php';

    session_start();
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    $_SESSION = array();
    
    header('Location: ' . BASE_URL . '/login.php');

?>