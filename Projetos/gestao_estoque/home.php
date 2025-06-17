<?php

    include_once '../config/verificacao.php';
    include_once 'layout/header.php';

?>

    <main>

        <h1>Seja bem-vindo <?= $_SESSION['user'] ?>!</h1>

    </main>

<?php

    include_once 'layout/footer.php';

?>