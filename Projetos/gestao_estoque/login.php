<?php

    include_once 'config/constantes.php';
    include_once 'controllers/validacaoUsuario.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if($_POST['type'] == 'register'){

            $usuario = new validacaoUsuario(null, $_POST['type'], $_POST['email'], $_POST['senha'], $_POST['repetir_senha'], $_POST['nome'], $_POST['nivel_de_acesso'], $_POST['ativo']);

            $usuario->manage();

        } else if($_POST['type'] == 'login'){

            $usuario = new validacaoUsuario(null, $_POST['type'], $_POST['email'], $_POST['senha']);

            $usuario->manage();

        }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/static/css/style.css">
    <title>Login</title>
</head>
<body>
    
    <div id="login">

        <?php 
            
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<ul>";
                    
                    if (!empty($usuario->mensagens['erro'])){

                        foreach($usuario->mensagens['erro'] as $erro){

                            if($erro != null){

                                echo "<li id='mensagem_erro'> $erro </li>";
                                
                            }

                        }

                    }

                echo "</ul>";

            }

        ?>

        <div>

            <h1>Seja bem-vindo!</h1>
            
            <h2>Login</h2>

            <form action="<?= BASE_URL ?>/login.php" method="POST">

                <input type="hidden" name="type" value="login">

                <label for="iemail">Email</label>
                <input type="email" name="email" id="iemail">

                <label for="isenha">Senha</label>
                <input type="password" name="senha" id="isenha">

                <button type="submit">Entrar</button>

            </form>

        </div>

        <div>

            <h2>Registre-se</h2>

            <form action="<?= BASE_URL ?>/login.php" method="POST" autocomplete="on">

                <input type="hidden" name="type" value="register">
                
                <label for="inome">Nome</label>
                <input type="text" name="nome" id="inome" minlength="3" maxlength="45" required>
                
                <label for="iemail">Email</label>
                <input type="email" name="email" id="iemail" minlength="5" maxlength="150" required>

                <label for="isenha">Senha</label>
                <input type="password" name="senha" id="isenha" minlength="5" maxlength="150" required>

                <label for="irepetir_senha">Repetir senha</label>
                <input type="password" name="repetir_senha" id="irepetir_senha" minlength="5" maxlength="150" required>

                <label for="inivel_de_acesso">Nível de Acesso</label>
                <select name="nivel_de_acesso" id="inivel_de_acesso">

                    <option value="ADM">Administrador</option>
                    <option value="GER">Gerente</option>
                    <option value="USER">Usuário</option>

                </select>

                <label for="iativo">Status</label>
                <select name="ativo" id="iativo">

                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>

                </select>

                <button type="submit">Cadastrar</button>

            </form>

        </div>
    </div>

</body>
</html>

</body>
</html>