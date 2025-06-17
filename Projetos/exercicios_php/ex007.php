<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 7</title>

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

    <h1>Exerício 7</h1>
    
    <form action="ex007.1.php" method="POST" autocomplete="on">

        <fieldset>

            <legend>Mês do ano</legend>
            <label for="imes">Mês</label>
            <input type="number" name="mes" id="imes" min="1" max="12" required>

            <button type="submit">Enviar</button>

        </fieldset>

    </form>

</body>
</html>