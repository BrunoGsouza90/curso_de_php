<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'models/Fornecedores.php';

    $fornecedor = new Fornecedores();
    $fornecedor = $fornecedor->exibirFornecedor($_POST['id']);

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarForncedores.php">Voltar</a></button>

        <div>

            <h1>Fornecedor <?= $fornecedor['razaosocial'] ?></h1>
            <br>
            <p>CNPJ / CPF: <?= $fornecedor['cnpj_cpf'] ?>.</p>
            <p>Rua: <?= $fornecedor['rua'] ?>.</p>
            <p>Número: <?= $fornecedor['numero'] ?>.</p>
            <p>Bairro: <?= $fornecedor['bairro'] ?>.</p>
            <p>CEP: <?= $fornecedor['cep'] ?>.</p>
            <p>Estado: <?= $fornecedor['estado'] ?>.</p>
            <p>Telefone: <?= $fornecedor['telefone'] ?>.</p>
            <p>Email: <?= $fornecedor['email'] ?>.</p>
            <p>Inscrição Estadual: <?= $fornecedor['ins_estadual'] ?>.</p>
            <p>Inscrição Municipal: <?= $fornecedor['ins_municipal'] ?>.</p>
            <p>Produto / Serviço: <?= $fornecedor['produto_servico'] ?>.</p>

        </div>

    </main>

<?php

    include_once 'templates/footer.php';

?>