<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'models/Clientes.php';

    $clientes_class = new Clientes();
    $clientes_array = $clientes_class->exibirClientes();

    foreach($clientes_array as $clientes){

        $lista_clientes = $clientes;

    }


?>

        <main>

            <h1 id="titulo">Gestão de Estoque</h1>

            <button><a href="<?= BASE_URL ?>/criarCliente.php">Criar Cliente</a></button>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Razão Social</th>
                        <th>CNPJ / CPF</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($lista_clientes as $cliente): ?>

                        <tr>

                            <td><?= $cliente['id'] ?></td>
                            <td><?= $cliente['razaosocial'] ?></td>
                            <td><?= $cliente['cnpj_cpf'] ?></td>

                            <td>

                                <form class="icon" action="<?= BASE_URL ?>/visualizarCliente.php" method=POST>

                                    <input type="hidden" name="id" value="<?= $cliente['id'] ?>"/>

                                    <button type="submit"><i class="fa-solid fa-eye"></i></button>
                                
                                 </form>

                                 <form class="icon" action="<?= BASE_URL ?>/editarCliente.php" method=POST>

                                    <input type="hidden" name="id" value="<?= $cliente['id'] ?>"/>

                                    <button type="submit">

                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </button>
                                
                                </form>

                                <form class="icon" action="<?= BASE_URL ?>/excluirCliente.php" method=POST>

                                    <input type="hidden" name="type" value="delete">

                                    <input type="hidden" name="id" value="<?= $cliente['id'] ?>"/>

                                    <button type="submit">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

            <?php if(empty($lista_clientes)): ?>

                <p>Não há clientes cadastrados! <a href="<?= BASE_URL ?>/criarCliente.php">Clique aqui</a> para cadastrar novos clientes...</p>

            <?php endif; ?>

        </main>

    </div>

<?php

    include_once 'templates/footer.php';

?>