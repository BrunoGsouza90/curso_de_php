<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'models/Clientes.php';

    $cliente = new Clientes();
    $cliente = $cliente->exibirCliente($_POST['id']);

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarClientes.php">Voltar</a></button>

        <div>

            <h1>Cliente <?= $cliente['razaosocial'] ?></h1>
            <br>
            <p>CNPJ / CPF: <?= $cliente['cnpj_cpf'] ?>.</p>
            <p>Rua: <?= $cliente['rua'] ?>.</p>
            <p>Número: <?= $cliente['numero'] ?>.</p>
            <p>Bairro: <?= $cliente['bairro'] ?>.</p>
            <p>CEP: <?= $cliente['cep'] ?>.</p>
            <p>Estado: <?= $cliente['estado'] ?>.</p>
            <p>Telefone: <?= $cliente['telefone'] ?>.</p>
            <p>Email: <?= $cliente['email'] ?>.</p>
            <p>Nascimento: <?= $cliente['nascimento'] ?>.</p>
            <p>Profissão: <?= $cliente['profissao'] ?>.</p>
            <p>Sexo: <?= $cliente['sexo'] ?>.</p>

        </div>

    </main>

<?php

    include_once 'templates/footer.php';

?>