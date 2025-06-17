<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Prático</title>
</head>
<body>
    
    <h1>Exercício Prático</h1>

    <?php

        require_once 'banco.php';

        echo "<h2>Jubileu</h2>";

        $jubileu = new Banco();
        $jubileu->set_numero(1);
        $jubileu->set_dono('Jubileu');

        $jubileu->abrirConta('cp');
        $jubileu->depositar(300);

        echo "<br>";

        echo "<h2>Creusa</h2>";

        $creusa = new Banco();
        $creusa->set_numero(2);
        $creusa->set_dono('Creusa');
        $creusa->abrirConta('cc');
        $creusa->depositar(500);
        $creusa->sacar(100);

    ?>

</body>
</html>