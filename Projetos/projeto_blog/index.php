    <?php

        include_once 'templates/header.php';

    ?>

    <main>

        <div id="container">

            <div id="titulo">

                <h1>Blog Codar</h1>
                <p>O seu blog de progamação</p>

            </div>

            <div id="posts">

                <?php foreach($posts as $post): ?>

                    <div id="caixa_post">

                        <img src="<?= $BASE_URL ?>/static/img/<?= $post['img'] ?>" alt="<?= $post['titulo'] ?>" class="imagem_post">

                        <h2 id="titulo_post">

                            <a href="<?= $BASE_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['titulo'] ?></a>

                        </h2>

                        <p id="descricao_post">

                            <?= $post['descricao'] ?>

                        </p>

                        <div id="tags_post">

                            <?php foreach($post['tags'] as $tag): ?>
                                
                                <a href="#"><?= $tag ?></a>

                            <?php endforeach; ?>

                        </div>

                    </div>

                <?php endforeach;?>

            </div>

        </div>

    </main>

    <?php

        include_once 'templates/footer.php';

    ?>