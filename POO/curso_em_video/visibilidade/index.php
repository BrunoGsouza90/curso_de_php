<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visibilidade</title>
</head>
<body>
    
    <h1>Visibilidade</h1>

    <?php

        require_once 'caneta.php';

        $c1 = new Caneta();

        $c1->modelo = 'BIC Cristal'; // Atributo público.

        // Atributo público.
        $c1->cor = 'Azul';

        // Atributo privado. ERRO!
        // $c1->ponta = 0.5;

        // Atributo protegido. ERRO!
        // $c1->tampada = true;

        var_dump($c1);

        // Método público.
        $c1->rabiscar();

        // Método publico.
        $c1->tampar();

        // Método privado. ERRO!
        $c1->destampar();

    ?>

</body>
</html>