<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'controllers/validacaoCliente.php';


    $id = $_POST['id'];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $validacao = new ValidacaoCliente($_POST['id'], $_POST['type'], $_POST['razaosocial'], $_POST['cnpj_cpf'], $_POST['rua'],$_POST['numero'], $_POST['bairro'], $_POST['cep'],$_POST['estado'],$_POST['telefone'], $_POST['email'], $_POST['nascimento'], $_POST['profissao'], $_POST['sexo']);

        $validacao->manage();

    }

    $clientes = new Clientes();
    $cliente = $clientes->ExibirCliente($id);

    $estados = $clientes->estados();
    $regioes = $clientes->regioes();

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarClientes.php">Voltar</a></button>


        <?php
            
                if($_SERVER['REQUEST_METHOD'] == 'POST' and $_POST['type'] == 'edit'){

                echo "<ul>";

                    if(!empty($validacao->mensagens['sucesso'])){

                        foreach($validacao->mensagens['sucesso'] as $sucesso){

                            if($sucesso != null){

                                echo "<li id='mensagem_sucesso'> $sucesso </li>";
                                
                            }

                        }

                    }
                    
                    if (!empty($validacao->mensagens['erro'])){

                        foreach($validacao->mensagens['erro'] as $erro){

                            if($erro != null){

                                echo "<li id='mensagem_erro'> $erro </li>";
                                
                            }

                        }

                    }

                echo "</ul>";

            }

        ?>

        <form action="<?= BASE_URL ?>/editarCliente.php" method="POST" autocomplete="on">

            <fieldset>
                <legend>Editar Cliente</legend>

                <input type="hidden" name="type" value="edit">
                <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

                <label for="irazaosocial">Razão Social *</label>
                <input type="text" name="razaosocial" id="irazaosocial" minlength="5" maxlength="45" required value="<?= $cliente['razaosocial'] ?>">

                <label for="icnpj_cpf">CNPJ / CPF</label>
                <input type="text" name="cnpj_cpf" id="icnpj_cpf" minlength="0" maxlength="14" value="<?= $cliente['cnpj_cpf'] ?>">

                <label for="irua">Rua</label>
                <input type="text" name="rua" id="irua" minlength="0" maxlength="95" value="<?= $cliente['rua'] ?>">

                <label for="inumero">Número</label>
                <input type="number" name="numero" id="inumero" minlength="0" maxlength="4" value="<?= $cliente['numero'] ?>">

                <label for="ibairro">Bairro</label>
                <input type="text" name="bairro" id="ibairro" minlength="0" maxlength="25" value="<?= $cliente['bairro'] ?>">

                <label for="cep">CEP</label>
                <input type="text" name="cep" id="icep" minlength="0" maxlength="8" value="<?= $cliente['cep'] ?>">

                <label for="iestado">Estado</label>
                <select name="estado" id="iestado">

                    <option value="">--Escolha--</option>

                    <optgroup label='Região Norte'>
                        
                    <?php foreach($clientes->estados() as $estado): ?>

                        <?php if($estado['regiao'] == 'Região Norte'): ?>
                        
                            <option <?= $cliente['estado'] == $estado['nome'] ? 'selected' : '' ?> value="<?= $estado['nome'] ?>"><?= $estado['descricao'] ?></option>
                            
                        <?php endif; ?>
                    
                
                    <?php endforeach; ?>

                    </optgroup>

                    <optgroup label='Região Nordeste'>
                        
                        <?php foreach($clientes->estados() as $estado): ?>
    
                            <?php if($estado['regiao'] == 'Região Nordeste'): ?>
                            
                                <option <?= $cliente['estado'] == $estado['nome'] ? 'selected' : '' ?> value="<?= $estado['nome'] ?>"><?= $estado['descricao'] ?></option>
                                
                            <?php endif; ?>
                        
                    
                        <?php endforeach; ?>
    
                    </optgroup>

                    <optgroup label='Região Centro-Oeste'>
                        
                        <?php foreach($clientes->estados() as $estado): ?>
    
                            <?php if($estado['regiao'] == 'Região Centro-Oeste'): ?>
                            
                                <option <?= $cliente['estado'] == $estado['nome'] ? 'selected' : '' ?> value="<?= $estado['nome'] ?>"><?= $estado['descricao'] ?></option>
                                
                            <?php endif; ?>
                        
                    
                        <?php endforeach; ?>
    
                    </optgroup>

                    <optgroup label='Região Sudeste'>
                        
                        <?php foreach($clientes->estados() as $estado): ?>
    
                            <?php if($estado['regiao'] == 'Região Sudeste'): ?>
                            
                                <option <?= $cliente['estado'] == $estado['nome'] ? 'selected' : '' ?> value="<?= $estado['nome'] ?>"><?= $estado['descricao'] ?></option>
                                
                            <?php endif; ?>
                        
                    
                        <?php endforeach; ?>
    
                    </optgroup>

                    <optgroup label='Região Sul'>
                        
                        <?php foreach($clientes->estados() as $estado): ?>
    
                            <?php if($estado['regiao'] == 'Região Sul'): ?>
                            
                                <option <?= $cliente['estado'] == $estado['nome'] ? 'selected' : '' ?> value="<?= $estado['nome'] ?>"><?= $estado['descricao'] ?></option>
                                
                            <?php endif; ?>
                        
                    
                        <?php endforeach; ?>
    
                    </optgroup>

                </select>
                
                <br>

                <label for="itelefone">Telefone *</label>
                <input type="text" name="telefone" id="itelefone" minlength="10" maxlength="11" value="<?= $cliente['telefone'] ?>" required>

                <label for="iemail">Email</label>
                <input type="email" name="email" id="iemail" minlength="5" maxlength="45" value="<?= $cliente['email'] ?>">

                <label for="inascimento">Nascimento</label>
                <input type="date" name="nascimento" id="inascimento" value="<?= $cliente['nascimento'] ?>">

                <label for="iprofissao">Profissao</label>
                <input type="text" name="profissao" id="iprofissao" minlength="5" maxlength="25" value="<?= $cliente['profissao'] ?>">

                <label for="isexo">Sexo</label>
                <select name="sexo" id="isexo">

                    <option value="" selected>--Escolha--</option>
                    

                    <option <?= $cliente['sexo'] == 'Masculino' ? 'selected' : '' ?> value="Masculino">Masculino</option>
                    <option <?= $cliente['sexo'] == 'Feminino' ? 'selected' : '' ?> value="Feminino">Feminino</option>

                </select>

                <input type="hidden" name="update" value="1" />

                <button type="submit">Atualizar</button>

            </fieldset>

        </form>

    </main>

<?php

    include_once 'templates/footer.php';

?>