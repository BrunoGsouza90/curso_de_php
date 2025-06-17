<?php

    include_once 'templates/header.php';

?>

    <main>

        <div class="container">

            <?php include_once 'templates/backbtn.html'; ?>

            <h1 id="titulo_principal">Criar Contato</h1>

            <form action="<?= $BASE_URL ?>/config/processamento.php" method="POST">

                <input type="hidden" name="type" value="create">
                <div class="form-group">

                    <label style="margin-top: 10px;"  for="nome">Nome do contato: </label>
                    <input style="margin-top: 10px;" type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome" required>

                    <label style="margin-top: 10px;"  for="telefone">Telefone do contato:</label>
                    <input style="margin-top: 10px;"  type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone">

                    <label style="margin-top: 10px;"  for="observacao">Observações</label>
                    <textarea style="margin-top: 10px;"  type="text" class="form-control" id="observacao" name="observacao" placeholder="Insira as obervações" rows=4 cols= 50></textarea>

                    <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Cadastrar</button>

                </div>

            </form>

        </div>

    </main>


<?php

    include_once 'templates/footer.php';

?>