    <?php

        include_once 'templates/header.php';

    ?>

    <main>

        <div class="container">

            <?php if(!empty($_SESSION['mensagem_sucesso'])): ?>

                <p id="mensagem"><?php echo $_SESSION['mensagem_sucesso']; $_SESSION['mensagem_sucesso'] = ''; ?></p>

            <?php elseif(!empty($_SESSION['mensagem_erro'])): ?>

                <p id="mensagem"><?php echo $_SESSION['mensagem_erro']; $_SESSION['mensagem_erro'] = ''; ?></p>
            
            <?php endif; ?>

            <h1 id="titulo_principal">Minha Agenda</h1>

            <?php if(!empty($contatos)): ?>

                <table class="table" id="contatos-table">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Observação</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach($contatos as $contato): ?>

                            <tr>

                                <td id="empty-list-text" style="font-weight: bolder;"><?= $contato['id'] ?></td>
                                <td id="empty-list-text"><?= $contato['nome'] ?></td>
                                <td id="empty-list-text"><?= $contato['telefone'] ?></td>
                                <td id="empty-list-text"><?= $contato['observacao'] ?></td>
                                
                                <td>

                                    <a class="actions" href="<?= $BASE_URL ?>/show.php?id=<?= $contato['id'] ?>"><i style="color: green;" class="fas fa-eye check-icon"></i></a>

                                    <a class="actions" href="<?= $BASE_URL ?>/edit.php?id=<?= $contato['id'] ?>"><i class="fas fa-edit edit-icon"></i></a>

                                    <form action="<?= $BASE_URL ?>/config/processamento.php" method="POST">
                                    
                                        <input type="hidden" name="type" value="delete">

                                        <input type="hidden" name="id" value="<?= $contato['id'] ?>">

                                        <button style="border: none; background-color: white;" type="submit"><i style="color: red; font-weight: bolder;" class="fa-solid fa-x"></i></button>

                                    </form>
                                
                                </td>

                            </tr>

                        <?php endforeach; ?>


                    </tbody>

                </table>

            <?php else: ?>

                <p id="empty-list-text">Ainda não existem contatos na sua agenda, <a href="<?= $BASE_URL ?>/create.php">Clique aqui para adicionar</a>.</p>

            <?php endif; ?>

        </div>

    </main>


    <?php

        include_once 'templates/footer.php';

    ?>