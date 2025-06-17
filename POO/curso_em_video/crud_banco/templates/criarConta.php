<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/style.css">
    <title>Exemplo Prático</title>
</head>
<body>
    
    <h1>Exemplo Prático</h1>

    <h3>Criar conta:</h3>

    <form action="../database/Conta/criarConta.php" method="POST" autocomplete="on">

        <label for="inome">Nome:</label>
        <input type="text" name="nome" id="inome">

        <label for="itipo">Tipo de conta:</label>
        <select name="tipo" id="itipo">

            <option value="cc">Conta Corrente</option>
            <option value="cp">Conta Poupança</option>

        </select>

        <button type="submit">Criar</button>
        
    </form>

</body>
</html>