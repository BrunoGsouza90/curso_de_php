<?php

    include_once 'templates/header.php';

    if(isset($_GET['id'])){

        $postId = $_GET['id'];
        $postAtual;

        foreach($posts as $post){

            if($post['id'] == $postId){

                $postAtual = $post;

            }

        }

    }

?>

    <main>

        <div id="post_container">

            <h1 id="titulo"><?= $postAtual['titulo'] ?></h1>
            <p id="descricao"><?= $postAtual['descricao'] ?></p>
            <div id="imagem">

                <img src="<?= $BASE_URL ?>/static/img/<?= $postAtual['img'] ?>" alt="<?= $postAtual['titulo'] ?>">

            </div>

            <p id="conteudo_post">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero itaque repudiandae aut laboriosam velit reiciendis neque porro vero nesciunt fugit cupiditate, aliquam officia similique consequatur eaque vitae sequi expedita eius!
            Dolor reiciendis aliquid quos vitae rem nostrum eaque odio possimus, corrupti placeat ea itaque illo omnis vel hic repellat temporibus consequatur officiis illum voluptatum quaerat suscipit dicta vero harum! Accusamus?
            Eveniet recusandae sequi praesentium ipsam assumenda commodi, non eaque rerum magnam dolores itaque iusto! Perspiciatis quos officiis minima, dolorem quaerat natus quibusdam officia amet aliquam placeat quae nemo dolor explicabo.
            Doloremque pariatur beatae, consectetur molestias fugit deserunt mollitia, culpa magni sequi voluptates modi enim vitae amet ad dignissimos excepturi quo libero voluptatibus, illo eos sed. Quos blanditiis iure exercitationem asperiores.
            Possimus cumque pariatur, qui blanditiis, modi, optio fuga accusamus at quasi beatae veritatis ipsum error iure ab animi saepe non est asperiores hic illo quae excepturi ipsam. Ratione, magnam quas?</p>

        </div>

    </main>

    <?php

        include_once 'templates/footer.php';

    ?>