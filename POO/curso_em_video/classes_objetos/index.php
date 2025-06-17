<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes e Objetos</title>
</head>
<body>
    
    <h1>Classes e Objetos</h1>

    <?php

        require_once 'caneta.php';

        $c1 = new Caneta();
        $c1->modelo = 'Bic';
        $c1->cor = 'Azul';
        $c1->ponta = 0.5;
        $c1->carga = 100;
        $c1->tampada = false; 

        var_dump($c1);

        $c1->rabiscar();

        $c1->tampar();

    ?>

</body>
</html>