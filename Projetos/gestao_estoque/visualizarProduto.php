<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'models/Produtos.php';

    $produto = new Produtos();
    $produto = $produto->exibirProduto_categoria($_POST['id']);

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarProdutos.php">Voltar</a></button>

        <div>

            <h1>Produto <?= $produto['nome'] ?></h1>
            <br>
            <p>Descrição: <?= $produto['descricao'] ?>.</p>

            <?php if(!empty($produto['codigo_barras'])): ?>
                
                <p>Código de Barras: <?= $produto['codigo_barras'] ?>.</p>
            
            <?php endif; ?>

            <p>Preço da compra: R$ <?= number_format($produto['preco_compra'], 2, ',', '') ?>.</p>
            <p>Preço da Venda: R$ <?= number_format($produto['preco_venda'], 2, ',', '') ?>.</p>
            <p>Quantidade em estoque: <?= $produto['quantidade_estoque'] ?>.</p>
            <p>Unidade de medida: <?= $produto['unidade_medida'] ?> cm.</p>
            <p>Status: <?= $produto['status'] ?>.</p>
            <p>Categoria: <?= $produto['categoria'] ?>.</p>

        </div>

    </main>

<?php

    include_once 'templates/footer.php';

?>