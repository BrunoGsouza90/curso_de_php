<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'models/Produtos.php';

    $produtos_class = new Produtos();
    $produtos_array = $produtos_class->exibirProdutos();

    foreach($produtos_array as $produtos){

        $lista_produtos = $produtos;

    }


?>

        <main>

            <h1 id="titulo">Gestão de Estoque</h1>

            <button><a href="<?= BASE_URL ?>/criarProduto.php">Criar produto</a></button>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($lista_produtos as $produto): ?>

                        <tr>

                            <td><?= $produto['id'] ?></td>
                            <td><?= $produto['nome'] ?></td>
                            <td><?= $produto['quantidade_estoque'] ?></td>
                            <td><?= $produto['ativo'] ?></td>

                            <td>

                                <form class="icon" action="<?= BASE_URL ?>/visualizarProduto.php" method=POST>

                                    <input type="hidden" name="id" value="<?= $produto['id_categoria'] ?>"/>

                                    <button type="submit"><i class="fa-solid fa-eye"></i></button>
                                
                                 </form>

                                 <form class="icon" action="<?= BASE_URL ?>/editarProduto.php" method=POST>

                                    <input type="hidden" name="id" value="<?= $produto['id'] ?>"/>

                                    <button type="submit">

                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </button>
                                
                                </form>

                                <form class="icon" action="<?= BASE_URL ?>/excluirProduto.php" method=POST>

                                    <input type="hidden" name="type" value="delete">

                                    <input type="hidden" name="id" value="<?= $produto['id'] ?>"/>

                                    <button type="submit">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

            <?php if(empty($lista_produtos)): ?>

                <p>Não há produtos cadastrados! <a href="<?= BASE_URL ?>/criarProduto.php">Clique aqui</a> para cadastrar novos produtos...</p>

            <?php endif; ?>

        </main>

    </div>

    <script>

        let mensagem_sucesso = document.querySelector('#mensagem')

        setTimeout(function(){
            mensagem_sucesso.style.display = 'none';
        }, 3000)

    </script>

<?php

    include_once 'templates/footer.php';

?>