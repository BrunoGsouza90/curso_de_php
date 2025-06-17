<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'controllers/validacaoFornecedor.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $validacao = new ValidacaoFornecedor(null ,$_POST['type'], $_POST['razaosocial'], $_POST['cnpj_cpf'], $_POST['rua'],$_POST['numero'], $_POST['bairro'], $_POST['cep'],$_POST['estado'],$_POST['telefone'], $_POST['email'], $_POST['ins_estadual'], $_POST['ins_municipal'], $_POST['produto_servico']);

        $validacao->manage();

    }

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarFornecedores.php">Voltar</a></button>


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

        <form action="<?= BASE_URL ?>/criarFornecedor.php" method="POST" autocomplete="on">

            <fieldset>
                <legend>Cadastrar Fornecedor</legend>

                <input type="hidden" name="type" value="create">

                <label for="irazaosocial">Razão Social *</label>
                <input type="text" name="razaosocial" id="irazaosocial" minlength="5" maxlength="45" required>

                <label for="icnpj_cpf">CNPJ / CPF *</label>
                <input type="text" name="cnpj_cpf" id="icnpj_cpf" minlength="0" maxlength="14" required>

                <label for="irua">Rua*</label>
                <input type="text" name="rua" id="irua" minlength="0" maxlength="95" required>

                <label for="inumero">Número*</label>
                <input type="number" name="numero" id="inumero" minlength="0" maxlength="4" required>

                <label for="ibairro">Bairro*</label>
                <input type="text" name="bairro" id="ibairro" minlength="0" maxlength="25" required>

                <label for="cep">CEP *</label>
                <input type="text" name="cep" id="icep" minlength="0" maxlength="8" required>

                <label for="iestado">Estado *</label>
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

                <label for="iemail">Email *</label>
                <input type="email" name="email" id="iemail" minlength="5" maxlength="45" required>

                <label for="iins_estadual">Inscrição Estadual *</label>
                <input type="text" name="ins_estadual" id="iins_estadual" minlength="8" maxlength="14" required>

                <label for="iins_municipal">Inscrição Municipal *</label>
                <input type="text" name="ins_municipal" id="iins_municipal" minlength="6" maxlength="15" required>

                <label for="iproduto_servico">Produto / Serviço *</label>
                <input type="text" name="produto_servico" id="iproduto_servico" list="lstproduto_servico">
                <datalist id="lstproduto_servico">

                    <option value="Alimentos"></option>
                    <option value="Bebidas"></option>
                    <option value="Roupas"></option>
                    <option value="Calçados"></option>
                    <option value="Eletrônicos"></option>
                    <option value="Móveis"></option>
                    <option value="Eletrodomésticos"></option>
                    <option value="Veículos"></option>
                    <option value="Peças automotivas"></option>
                    <option value="Materiais de construção"></option>
                    <option value="Cosméticos"></option>
                    <option value="Medicamentos"></option>
                    <option value="Serviços médicos"></option>
                    <option value="Serviços odontológicos"></option>
                    <option value="Educação"></option>
                    <option value="Cursos profissionalizantes"></option>
                    <option value="Consultoria empresarial"></option>
                    <option value="Serviços jurídicos"></option>
                    <option value="Contabilidade"></option>
                    <option value="Publicidade e marketing"></option>
                    <option value="Serviços de TI"></option>
                    <option value="Hospedagem e turismo"></option>
                    <option value="Restaurantes e bares"></option>
                    <option value="Transporte e logística"></option>
                    <option value="Serviços de limpeza"></option>
                    <option value="Jardinagem e paisagismo"></option>
                    <option value="Construção civil"></option>
                    <option value="Decoração e design de interiores"></option>
                    <option value="Segurança privada"></option>
                    <option value="Eventos e entretenimento"></option>
                    <option value="Agronegócio"></option>
                    <option value="Papelaria e escritório"></option>
                    <option value="Serviços de estética"></option>
                    <option value="Pet shop e veterinária"></option>

                </datalist>

                <button type="submit">Cadastrar</button>

            </fieldset>

        </form>

    </main>

<?php

    include_once 'templates/footer.php';

?>

<?php

    include_once 'template/footer.php';

?>