<?php

    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($_SERVER['REQUEST_METHOD'] ==  'POST'){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

    }

    $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES ('$nome', '$email', '$telefone');";

    if ($conn->query($sql) == true){
        echo "Usuário inserido com sucesso.<br>";
    } else {
        echo "Erro ao inserir o usuário.<br>" . $conn->error . "<br>";
    }

    $conn->close();

?>