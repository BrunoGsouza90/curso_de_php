<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'models/Categorias.php';

    $categorias_class = new Categorias();
    $categorias_array = $categorias_class->exibirCategorias();

    foreach($categorias_array as $categorias){

        $lista_categorias = $categorias;

    }


?>

        <main>

            <h1 id="titulo">Gestão de Estoque</h1>

            <button><a href="<?= BASE_URL ?>/criarCategoria.php">Criar categoria</a></button>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nome</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($lista_categorias as $categoria): ?>

                        <tr>

                            <td><?= $categoria['id'] ?></td>
                            <td><?= $categoria['nome'] ?></td>

                            <td>

                                <form class="icon" action="<?= BASE_URL ?>/visualizarCategoria.php" method=POST>

                                    <input type="hidden" name="id" value="<?= $categoria['id'] ?>"/>

                                    <button type="submit"><i class="fa-solid fa-eye"></i></button>
                                
                                 </form>

                                 <form class="icon" action="<?= BASE_URL ?>/editarCategoria.php" method=POST>

                                    <input type="hidden" name="id" value="<?= $categoria['id'] ?>"/>

                                    <button type="submit">

                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </button>
                                
                                </form>

                                <form class="icon" action="<?= BASE_URL ?>/excluirCategoria.php" method=POST>

                                    <input type="hidden" name="type" value="delete">

                                    <input type="hidden" name="id" value="<?= $categoria['id'] ?>"/>

                                    <button type="submit">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

            <?php if(empty($lista_categorias)): ?>

                <p>Não há categorias cadastradas! <a href="<?= BASE_URL ?>/criarCategoria.php">Clique aqui</a> para cadastrar novas categorias...</p>

            <?php endif; ?>

        </main>

    </div>

<?php

    include_once 'templates/footer.php';

?>