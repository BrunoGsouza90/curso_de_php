<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>

    <style>

        fieldset{

            padding: 10px;

        }

        button{

            display: block;
            margin-top: 10px;

        }

    </style>

</head>
<body>

    <h1>Exerício 1</h1>
    
    <form action="ex001.1.php" method="POST" autocomplete="on">

        <fieldset>

            <legend>Data de um usuário</legend>
            <label for="idata">Data</label>
            <input type="date" name="data" id="idata" required>

            <button type="submit">Enviar</button>

        </fieldset>

    </form>

</body>
</html>