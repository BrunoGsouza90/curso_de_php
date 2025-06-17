<?php

    include_once 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if($_POST['type'] == 'login'){

            if(empty($_POST['email']) || empty($_POST['senha'])){

                if(strlen($_POST['email']) == 0){
        
                    echo "Por favor preencha seu email!<br>";
                    
                }
        
                if(strlen($_POST['senha']) == 0){
        
                    echo "Por favor preencha sua senha!<br>";          
        
                }
        
            } else {
    
                try{
    
                    $sql = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    
                    $email = $_POST['email'];
        
                    $sql->bindParam(":email", $email);
        
                    $sql->execute();
    
                    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

                    $hash = $usuario['senha'];

                    $senha = $_POST['senha'];
    
    
                    if(!empty($usuario)){
    
                        if(password_verify($senha, $hash)){

                            session_start();

                            $_SESSION['user'] = $usuario['nome'];
    
                            echo "Bem-vindo {$_SESSION['user']}!";
    
                            header('Location: http://localhost:81/estudo_php/crud_login/painel.php');
    
                        } else {

                            echo $hash;
                            echo "<br>";
                            echo $senha;
                            echo "<br>";

                            echo "Senha valida!<br>";
    
                        }
    
                    } else {
    
                        echo "Esse usuário não existe!";
    
                    }
    
                } catch(PDOException $e){
    
                    echo "Erro: {$e->getMessage()}";
    
                }
    
            }

        } else if ($_POST['type'] == 'register'){

            $sql = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");

            $email = $_POST['email'];

            $sql->bindParam(":email", $email);

            $sql->execute();

            $usuario = $sql->fetch(PDO::FETCH_ASSOC);

            if($email == $usuario['email']){

                echo "Esse usuário já está cadastrado!<br>";

            } else {

                try{

                    $sql = $conn->prepare("INSERT INTO usuarios (email, senha, nome) VALUES (:email, :senha, :nome)");
    
                    $email = $_POST['email'];
                    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                    $nome = $_POST['nome'];
    
                    $sql->bindParam(":email", $email);
                    $sql->bindParam(":senha", $senha);
                    $sql->bindParam(":nome", $nome);
    
                    $sql->execute();

                    echo "Usuário cadastrado com sucesso!<br>";
    
                } catch(PDOException $e){

                    echo $senha;
    
                    echo "Erro ao registrar usuário: {$e->getMessage()}";
    
                }

            }

        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>

        input{

            display: block;
            margin-top: 10px;

        }

    </style>
</head>
<body>

        <h1>Sistema de Login</h1>
    
    <div>

        <h2>Login</h2>

        <form action="" method="POST">

            <input type="hidden" name="type" value="login">

            <label for="iemail">Email</label>
            <input type="email" name="email" id="iemail">

            <label for="isenha">Senha</label>
            <input type="password" name="senha" id="isenha">

            <br>

            <button type="submit">Entrar</button>

        </form>

    </div>

    <div>

        <h2>Registre-se</h2>

        <form action="" method="POST">

            <input type="hidden" name="type" value="register">

            <label for="inome">Nome</label>
            <input type="text" name="nome" id="inome">

            <label for="iemail">Email</label>
            <input type="email" name="email" id="iemail">

            <label for="isenha">Senha</label>
            <input type="password" name="senha" id="isenha">

            <br>

            <button type="submit">Cadastrar</button>

        </form>

    </div>

</body>
</html>