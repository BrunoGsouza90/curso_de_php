<?php

    include_once 'templates/header.php';

?>

    <main>

        <?php include_once 'templates/backbtn.html'; ?>

        <div class="container" id="view-contact-container">

            <h1 id="main-title"><?= $contato_id['nome'] ?></h1>

            <p class="bold">Telefone:</p>
            <p><?= $contato_id['telefone'] ?></p>

            <p class="bold">Observação:</p>
            <p><?= $contato_id['observacao'] ?></p>

        </div>

    </main>


<?php

    include_once 'templates/footer.php';

?>