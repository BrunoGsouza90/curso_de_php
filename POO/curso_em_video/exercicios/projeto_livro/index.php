<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Prático 2</title>
</head>
<body>
    
    <h1>Exemplo Prático 2</h1>

    <?php

        require_once 'pessoas.php';
        require_once 'livro.php';

        $bruno = new Pessoas('Bruno', 25, 'Masculino');
        $livro = new Livro('Capitaẽs da Areia', 'Machado de Assis', 280, $bruno->get_nome());

        $livro->detalhes();
        $livro->abrirLivro();
        $livro->avancarPagina(100);
        $livro->voltarPagina(50);
        $livro->fecharLivro();

    ?>

</body>
</html>