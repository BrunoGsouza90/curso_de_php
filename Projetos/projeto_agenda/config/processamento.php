<?php

    session_start();

    include_once 'conexao.php';
    include_once '../helpers/url.php';

    if(!empty($_POST)){

        if($_POST["type"] === 'create'){

            $nome = $_POST["nome"];
            $telefone = $_POST['telefone'];
            $observacao = $_POST['observacao'];

            $sql = $conn->prepare("INSERT INTO contatos (nome, telefone, observacao) VALUES (:nome, :telefone, :observacao)");

            $sql->bindParam(":nome", $nome);
            $sql->bindParam(":telefone", $telefone);
            $sql->bindParam(":observacao", $observacao);

            try{

                $sql->execute();
                $_SESSION['mensagem_sucesso'] = "Contato criado com sucesso.";

            } catch(PDOException $e){

                $_SESSION['mensagem_erro'] = "Erro ao inserir contato: " . $e->getMessage();

            }

        } else if($_POST["type"] == 'edit'){

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $observacao = $_POST['observacao'];

            $sql = $conn->prepare("UPDATE contatos SET nome = :nome, telefone = :telefone, observacao = :observacao WHERE id = :id");

            $sql->bindParam(":id", $id);
            $sql->bindParam(":nome", $nome);
            $sql->bindParam(":telefone", $telefone);
            $sql->bindParam(":observacao", $observacao);

            try{

                $sql->execute();
                $_SESSION['mensagem_sucesso'] = "Contato editado com sucesso.";

            } catch(PDOException $e){

                $_SESSION['mensagem_erro'] = "Erro ao inserir contato: " . $e->getMessage();

            }

        } else if($_POST["type"] == 'delete'){

            $sql = $conn->prepare("DELETE FROM contatos WHERE id = :id");

            $id = $_POST['id'];

            $sql->bindParam(":id", $id);

            try{

                $sql->execute();

                $_SESSION['mensagem_sucesso'] = "Contato deleteado com sucesso";

            } catch(PDOException $e){

                $_SESSION['mensagem_erro'] = "Erro ao excluir contato: {$e->getMessage()}";

            }

        }

        header("Location: $BASE_URL/index.php");

    } else {

        // Retorna todos os contatos.
        $contatos = [];

        $sql = $conn->prepare("SELECT * FROM contatos");

        $sql->execute();

        $contatos = $sql->fetchAll();

        // Retorna apenas um contato.
        $contato_id = 0;

        $sql = $conn->prepare("SELECT * FROM contatos WHERE id = :id");

        $sql->bindParam(":id", $_GET['id']);

        $sql->execute();

        $contato_id = $sql->fetch();

    }

    $conn = null;

?>