<?php

    include_once 'templates/header.php';

?>

    <main>

        <div class="container">

            <?php include_once 'templates/backbtn.html'; ?>

            <h1 id="titulo_principal">Editar Contato</h1>

            <form action="<?= $BASE_URL ?>/config/processamento.php" method="POST">

                <input type="hidden" name="type" value="edit">
                <input type="hidden" name="id" value="<?= $contato_id['id'] ?>">
                <div class="form-group">

                    <label style="margin-top: 10px;"  for="nome">Nome do contato: </label>
                    <input style="margin-top: 10px;" type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome" value = <?= $contato_id['nome'] ?> required>

                    <label style="margin-top: 10px;"  for="telefone">Telefone do contato:</label>
                    <input style="margin-top: 10px;"  type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" value="<?= $contato_id['telefone'] ?>">

                    <label style="margin-top: 10px;"  for="observacao">Observações</label>
                    <textarea style="margin-top: 10px;"  type="text" class="form-control" id="observacao" name="observacao" placeholder="Insira as obervações" rows=4 cols= 50><?= $contato_id['observacao'] ?></textarea>

                    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Editar</button>

                </div>

            </form>

        </div>

    </main>


<?php

    include_once 'templates/footer.php';

?>