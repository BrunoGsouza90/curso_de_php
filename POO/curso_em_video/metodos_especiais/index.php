<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos Especiais</title>
</head>
<body>
    
    <h1>Métodos Especiais</h1>

    <?php

        require_once 'caneta.php';

        $c1 = new Caneta(true);

        $c1->setModelo('BIC Cristal');
        $c1->setPonta(0.5);

        echo $c1->getModelo() . "<br>";
        echo $c1->getPonta() . "<br>";

    ?>

</body>
</html>