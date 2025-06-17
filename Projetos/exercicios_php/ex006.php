<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 6</title>

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
            margin-top: 10px;

        }

    </style>

</head>
<body>

    <h1>Exerício 6</h1>
    
    <form action="ex006.1.php" method="POST" autocomplete="on">

        <fieldset>

            <legend>Formato de String</legend>
            <label for="inome">Nome</label>
            <input type="text" name="nome" id="inome" required>

            <label for="isobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="isobrenome" required>

            <label for="iultimonome">Último nome</label>
            <input type="text" name="ultimonome" id="iultimonome" required>

            <button type="submit">Enviar</button>

        </fieldset>

    </form>

</body>
</html>