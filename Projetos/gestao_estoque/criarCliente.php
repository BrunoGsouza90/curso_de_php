<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'controllers/validacaoCliente.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $validacao = new ValidacaoCliente(null ,$_POST['type'], $_POST['razaosocial'], $_POST['cnpj_cpf'], $_POST['rua'],$_POST['numero'], $_POST['bairro'], $_POST['cep'],$_POST['estado'],$_POST['telefone'], $_POST['email'], $_POST['nascimento'], $_POST['profissao'], $_POST['sexo']);

        $validacao->manage();
        
    }

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarClientes.php">Voltar</a></button>


        <?php 
            
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

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

        <form action="<?= BASE_URL ?>/criarCliente.php" method="POST" autocomplete="on">

            <fieldset>
                <legend>Cadastrar Cliente</legend>

                <input type="hidden" name="type" value="create">

                <label for="irazaosocial">Razão Social *</label>
                <input type="text" name="razaosocial" id="irazaosocial" minlength="5" maxlength="45" required>

                <label for="icnpj_cpf">CNPJ / CPF</label>
                <input type="text" name="cnpj_cpf" id="icnpj_cpf" minlength="0" maxlength="14">

                <label for="irua">Rua</label>
                <input type="text" name="rua" id="irua" minlength="0" maxlength="95">

                <label for="inumero">Número</label>
                <input type="number" name="numero" id="inumero" minlength="0" maxlength="4">

                <label for="ibairro">Bairro</label>
                <input type="text" name="bairro" id="ibairro" minlength="0" maxlength="25">

                <label for="cep">CEP</label>
                <input type="text" name="cep" id="icep" minlength="0" maxlength="8">

                <label for="iestado">Estado</label>
                <select name="estado" id="iestado">

                    <option value="" selected>--Escolha--</option>

                    <optgroup label="Região Norte">
                        <option value="AC">Acre</option>
                        <option value="AL">Amazonas</option>
                        <option value="AP">Amapá</option>
                        <option value="PA">Pará</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="TO">Tocantins</option>
                    </optgroup>

                    <optgroup label="Região Nordeste">
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="MA">Maranhão</option>
                        <option value="PB">Paraíba</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="SE">Sergipe</option>
                    </optgroup>

                    <optgroup label="Região Centro-Oeste">
                        <option value="DF">Distrito Federal</option>
                        <option value="GO">Goiás</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                    </optgroup>

                    <optgroup label="Região Sudeste">
                        <option value="ES">Espírito Santo</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="SP">São Paulo</option>
                    </optgroup>

                    <optgroup label="Região Sul">
                        <option value="PR">Paraná</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="SC">Santa Catarina</option>
                    </optgroup>

                </select>
                
                <br>

                <label for="itelefone">Telefone *</label>
                <input type="text" name="telefone" id="itelefone" minlength="10" maxlength="11" required>

                <label for="iemail">Email</label>
                <input type="email" name="email" id="iemail" minlength="5" maxlength="45">

                <label for="inascimento">Nascimento</label>
                <input type="date" name="nascimento" id="inascimento">

                <label for="iprofissao">Profissão</label>
                <input type="text" name="profissao" id="iprofissao" minlength="5" maxlength="25">

                <label for="isexo">Sexo</label>
                <select name="sexo" id="isexo">

                    <option value="" selected>--Escolha--</option>

                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>

                </select>

                <button type="submit">Cadastrar</button>

            </fieldset>

        </form>

    </main>

<?php

    include_once 'templates/footer.php';

?>