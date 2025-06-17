<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 9</title>

    <style>

        fieldset{

            padding: 10px;

        }

        button{

            display: block;
            margin-top: 10px;

        }

        label{

            display: block;
            margin-top: 10x;

        }

    </style>

</head>
<body>

    <h1>Exerício 9</h1>
    
    <form action="ex009.1.php" method="POST" autocomplete="on">

        <fieldset>

            <legend>Dados de um usuário</legend>
            <label for="inome">Nome</label>
            <input type="text" name="nome" id="inome" maxlength="25" required>

            <label for="iemail">Email</label>
            <input type="email" name="email" id="iemail" maxlength="40" required>

            <label for="itelefone">Telefone</label>
            <input type="tel" name="telefone" id="itelefone" min="10" max="11" required>
        
            <button type="submit">Enviar</button>

        </fieldset>

    </form>

</body>
</html>