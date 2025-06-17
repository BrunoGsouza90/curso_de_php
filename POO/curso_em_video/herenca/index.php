<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herença (Parte 1)</title>
</head>
<body>
    
    <h1>Herença (Parte 1)</h1>

    <?php 

        require_once 'pessoas.php';
        require_once 'funcionarios.php';
        require_once 'professores.php';
        require_once 'alunos.php';

        // $bruno = new Alunos('Bruno', 25, 'Masculino', 'Ativada', 'Informática');

        // $bruno->cancelarMatricula();

        // $lucas = new Funcionarios('Lucas', 36, 'Masculino', 'Bombeiro');

        // $lucas->mudarTrabalho('Eletricista');

        $gabriela = new Professores('Gabriela', 24, 'Feminina', 'Professora de Mátematica', 2500);

        $gabriela->receberAumento(3000);

    ?>

</body>
</html>