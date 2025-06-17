<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encapsulamento</title>
</head>
<body>
    
    <h1>Encapsulamento</h1>

    <?php

        require_once 'controleRemoto.php';

        $controle = new ControleRemoto();

        $controle->abrirMenu();
        $controle->fecharMenu();
        $controle->play();
        $controle->maisVolume();
        $controle->abrirMenu();
        $controle->menosVolume();
        $controle->abrirMenu();

    ?>

</body>
</html>