<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>

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

    <h1>Exerício 3</h1>
    
    <form action="ex003.1.php" method="POST" autocomplete="on">

        <fieldset>

            <legend>Dia da semana</legend>

            <ol>

                <li>Domingo</li>
                <li>Segunda-Feira</li>
                <li>Terça-Feira</li>
                <li>Quarta-Feira</li>
                <li>Quinta-Feira</li>
                <li>Sexta-Feira</li>
                <li>Sábado</li>

            </ol>

            <label for="idia">Data</label>
            <input type="number" name="dia" id="idia" min="1" max="7" required>

            <button type="submit">Enviar</button>

        </fieldset>

    </form>

</body>
</html>