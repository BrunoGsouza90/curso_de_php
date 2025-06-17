<?php

    require_once 'conta.php';

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];

    echo $nome;

    class criarConta extends Conta{

        function __construct($nome, $tipo){

            $this->set_nome($nome);
            $this->set_tipo($tipo);

            $sql = "INSERT INTO conta(nome, tipo) VALUES ('" . $this->get_nome() . "', '" . $this->get_tipo() . "');";


            if ($this->conn->query($sql) === TRUE){

                echo "<p>Conta criada com sucesso!</p>";

            } else {

                echo "<p>Erro ao criar a conta " . $sql . "<br>" . $this->conn->error . "</p>";

            }

        }

    }

    new criarConta($nome, $tipo);

?>