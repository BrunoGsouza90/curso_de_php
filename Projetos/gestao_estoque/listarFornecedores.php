<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'controllers/validacaoFornecedor.php';

    $fornecedores_class = new Fornecedores();
    $fornecedores_array = $fornecedores_class->exibirFornecedores();

    foreach($fornecedores_array as $fornecedores){

        $lista_fornecedores = $fornecedores;

    }


?>

        <main>

            <h1 id="titulo">Gestão de Estoque</h1>

            <button><a href="<?= BASE_URL ?>/criarFornecedor.php">Criar Fornecedor</a></button>

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Razão Social</th>
                        <th>CNPJ / CPF</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($lista_fornecedores as $fornecedor): ?>

                        <tr>

                            <td><?= $fornecedor['id'] ?></td>
                            <td><?= $fornecedor['razaosocial'] ?></td>
                            <td><?= $fornecedor['cnpj_cpf'] ?></td>

                            <td>

                                <form class="icon" action="<?= BASE_URL ?>/visualizarFornecedor.php" method=POST>

                                    <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>"/>

                                    <button type="submit"><i class="fa-solid fa-eye"></i></button>
                                
                                 </form>

                                 <form class="icon" action="<?= BASE_URL ?>/editarFornecedor.php" method=POST>

                                    <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>"/>

                                    <button type="submit">

                                        <i class="fa-solid fa-pen-to-square"></i>

                                    </button>
                                
                                </form>

                                <form class="icon" action="<?= BASE_URL ?>/excluirFornecedor.php" method=POST>

                                    <input type="hidden" name="type" value="delete">

                                    <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>"/>

                                    <button type="submit">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

            <?php if(empty($lista_fornecedores)): ?>

                <p>Não há fornecedores cadastrados! <a href="<?= BASE_URL ?>/criarFornecedor.php">Clique aqui</a> para cadastrar novos fornecedores...</p>

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