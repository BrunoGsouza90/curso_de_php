<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>

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

    <h1>Exerício 2</h1>
    
    <form action="ex002.1.php" method="POST" autocomplete="on">

        <fieldset>

            <legend>Nota de um aluno</legend>
            <label for="inota">Nota</label>
            <input type="number" name="nota" id="inota" step="0.1" min="0.0" max="10.0" required>

            <button type="submit">Enviar</button>

        </fieldset>

    </form>

</body>
</html>