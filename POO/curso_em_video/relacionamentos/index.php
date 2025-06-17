<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacionamentos entre classes</title>
</head>
<body>
    
    <h1>Relacionamentos entre classes</h1>

    <?php

        require_once 'lutador.php';
        require_once 'luta.php';

        $lutadores = [

            'Lutador 1',
            'Lutador 2',
            'Lutador 3',
            'Lutador 4'

        ];

        $lutadores['Lutador 1'] = new Lutador('Bruno', 'Brasil', 25, 1.72, 75, 5, 2, 1);

        $lutadores['Lutador 2'] = new Lutador('Gabriel', 'Brasil', 25, 1.72, 75, 5, 2, 1);

        $lutadores['Lutador 3'] = new Lutador('Lucas', 'Brasil', 25, 1.72, 75, 5, 2, 1);

        $lutadores['Lutador 4'] = new Lutador('Matheus', 'Brasil', 25, 1.72, 75, 5, 2, 1);

        $lutadores['Lutador 5'] = new Lutador('Jorge', 'Brasil', 25, 1.72, 75, 5, 2, 1);

        $luta1 = new Luta();
        $luta1->marcarLuta($lutadores['Lutador 1'], $lutadores['Lutador 2']);

        $luta1->lutar();

    ?>

</body>
</html>