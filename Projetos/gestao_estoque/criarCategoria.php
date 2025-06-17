<?php

    include_once 'config/verificacao.php';
    include_once 'layout/header.php';
    include_once 'controllers/validacaoCategoria.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $validacao = new ValidacaoCategoria(null ,$_POST['type'], $_POST['nome'], $_POST['descricao']);

        $validacao->manage();
        
    }

?>

    <main>

        <button><a href="<?= BASE_URL ?>/listarCategorias.php">Voltar</a></button>


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

        <form action="<?= BASE_URL ?>/criarCategoria.php" method="POST" autocomplete="on">

            <fieldset>
                <legend>Cadastrar Categoria</legend>

                <input type="hidden" name="type" value="create">

                <label for="inome">Nome *</label>
                <input type="text" name="nome" id="inome" minlength="5" maxlength="45" required>

                <label for="idescricao">Descrição *</label>
                <textarea name="descricao" id="idescricao" cols="30" rows="10"></textarea>

                <button type="submit">Cadastrar</button>

            </fieldset>

        </form>

    </main>

<?php

    include_once 'layout/footer.php';

?>