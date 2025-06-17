<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'controllers/validacaoProduto.php';

    $id = $_POST['id'];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $validacao = new ValidacaoProduto($_POST['id'], $_POST['type'], $_POST['nome'], $_POST['descricao'], $_POST['codigo_barras'],$_POST['preco_compra'], $_POST['preco_venda'], $_POST['quantidade_estoque'],$_POST['unidade_medida'],$_POST['ativo'], $_POST['categoria']);

        $validacao->manage();

    }

    $produtos = new Produtos();
    $produto = $produtos->exibirProduto($id);

    $categorias = new Categorias();
    $categorias = $categorias->exibirCategorias();

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarProdutos.php">Voltar</a></button>


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

        <form action="<?= BASE_URL ?>/editarProduto.php" method="POST" autocomplete="on">

            <fieldset>
                <legend>Editar Produto</legend>

                <input type="hidden" name="type" value="edit">
                <input type="hidden" name="id" value="<?= $produto['id'] ?>">

                <label for="inome">Nome *</label>
                <input type="text" name="nome" id="inome" minlength="5" maxlength="45" value="<?= $produto['nome'] ?>" required>

                <label for="idescricao">Descrição *</label>
                <textarea name="descricao" id="idescricao" cols="30" rows="10"><?= $produto['descricao'] ?></textarea>

                <label for="icodigo_barras">Codigo de Barras</label>
                <input type="text" name="codigo" id="icodigo" minlength="0" maxlength="14" value="<?= $produto['codigo_barra'] ?>">

                <label for="ipreco_compra">Preço da Compra *</label>
                <input type="number" name="preco_compra" id="ipreco_compra" min="0.01" max="1000000" step="0.01" value="<?= $produto['preco_compra'] ?>">

                <label for="ipreco_venda">Preço da Venda *</label>
                <input type="number" name="preco_venda" id="ipreco_venda" min="0.01" max="1000000" step="0.01" value="<?= $produto['preco_venda'] ?>">

                <label for="iquantidade_estoque">Quantidade em estoque *</label>
                <input type="number" name="quantidade_estoque" id="iquantidade_estoque" minlength="0" maxlength="1000000000" value="<?= $produto['quantidade_estoque'] ?>">

                <label for="iunidade_medida">Unidade de medida *</label>
                <input type="number" name="unidade_medida" id="iunidade_medida" min="0" max="1000000" step="0.01" value="<?= $produto['unidade_medida'] ?>">

                <label for="iativo">Status *</label>
                <select name="ativo" id="iativo">

                    <option <?= $produto['ativo'] == 'ativo' ? 'selected' : '' ?> value="ativo">Ativo</option>
                    <option <?= $produto['ativo'] == 'inativo' ? 'selected' : '' ?> value="inativo">Inativo</option>

                </select>

                <label for="icategoria">Categoria *</label>
                <select name="categoria" id="icategoria">

                    <?php foreach($categorias as $item): ?>

                        <?php foreach($item as $categoria): ?>

                            <option <?= $produto['id_categoria'] == $categoria['id'] ? 'selectec' : '' ?> value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>

                        <?php endforeach; ?>

                    <?php endforeach; ?>

                </select>    

                <input type="hidden" name="update" value="1" />

                <button type="submit">Atualizar</button>

            </fieldset>

        </form>

    </main>

<?php

    include_once 'templates/footer.php';

?>