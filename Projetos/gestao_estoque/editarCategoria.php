<?php

    include_once 'config/verificacao.php';
    include_once 'templates/header.php';
    include_once 'controllers/validacaoCategoria.php';


    $id = $_POST['id'];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $validacao = new ValidacaoCategoria($_POST['id'], $_POST['type'], $_POST['nome'], $_POST['descricao']);

        $validacao->manage();

    }

    $categorias = new Categorias();
    $categoria = $categorias->ExibirCategoria($id);

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarCategorias.php">Voltar</a></button>


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

        <form action="<?= BASE_URL ?>/editarCategoria.php" method="POST" autocomplete="on">

            <fieldset>
                <legend>Editar Categoria</legend>

                <input type="hidden" name="type" value="edit">
                <input type="hidden" name="id" value="<?= $categoria['id'] ?>">

                <label for="inome">Nome *</label>
                <input type="text" name="nome" id="inome" minlength="5" maxlength="45" value="<?= $categoria['nome'] ?>" required>

                <label for="idescricao">Descrição *</label>
                <textarea name="descricao" id="idescricao" cols="30" rows="10"><?= $categoria['descricao'] ?></textarea>

                <input type="hidden" name="update" value="1" />

                <button type="submit">Atualizar</button>

            </fieldset>

        </form>

    </main>

<?php

    include_once 'templates/footer.php';

?>