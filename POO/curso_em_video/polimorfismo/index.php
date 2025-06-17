<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polimorfismo</title>
</head>
<body>
    
    <h1>Polimorfismo</h1>

    <?php

        require_once 'mamifero.php';
        require_once 'reptil.php';
        require_once 'peixe.php';
        require_once 'ave.php';

        echo "<h2>Mamífero:</h2>";
        $mamifero = new Mamifero();
        $mamifero->set_peso(3.5);
        $mamifero->locomover();

        echo "<h2>Ave:</h2>";
        $ave = new Ave();
        $ave->locomover();

        echo "<h2>Peixe:</h2>";
        $peixe = new Peixe();
        $peixe->locomover();

        echo "<h2>Réptil:</h2>";
        $reptil = new Reptil();
        $reptil->locomover();

    ?>

</body>
</html>