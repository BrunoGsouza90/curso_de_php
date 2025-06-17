<?php

    // Arquivo responsável pela leitura dos arquivos CSV e chamada da manipulação destes no Banco de Dados.

    // Arquivo de manipulação com o Banco de Dados.
    include_once 'models.php';

    // Arquivo responsável por remover acentuações de strings.
    include_once 'funcoes.php';

    // Classe responsável pela leitura do arquivo CSV, separação dos dados em vindos em linhas e manipulação destes no Banco de Dados.
    class CSV extends SUP{

        function manipularCSV($caminho){

            // Conexão com o Banco de Dados.
            $this->conectarBanco();

            // Abrimos o arquivo CSV para leitura.
            $arquivo = fopen($caminho, "r");

            // Estrutura de repetição de leitura das linhas do arquivo.
            while(!feof($arquivo)){

                $linhas = fgets($arquivo, 4096);

                // Removemos a acentuação da string de cada linha.
                $linha = removerAcentuacao($linhas);

                // Separação dos dados de acordo com as posições declaradas no arquivo "Layout.pdf".

                $regiao = trim(substr($linha, 0, 1));

                if(empty($regiao)){

                    $regiao = null;

                }

                $uf = trim(substr($linha, 1, 2));

                
                if(empty($uf)){

                    $uf = null;

                }

                $cn = trim(substr($linha, 3, 2));


                if(empty($cn)){

                    $cn = null;
                    
                }

                $cnl_municipio = trim(substr($linha, 5, 5));


                if(empty($cnl_municipip)){

                    $cnl_municipio = null;

                }

                $descricao_municipio = trim(substr($linha, 10, 50));


                if(empty($descricao_municipio)){

                    $descricao_municipio = null;

                }

                $cnl_localidade = trim(substr($linha, 60, 5));


                if(empty($cnl_localidade)){

                    $cnl_localidade = null;

                }

                $descricao_localidade = trim(substr($linha, 65, 60));


                if(empty($descricao_localidade)){

                    $descricao_localidade = null;

                }

                $bairro = trim(substr($linha, 125, 8));


                if(empty($bairro)){

                    $bairro = null;

                }

                $codigo_tri = trim(substr($linha, 133, 6));


                if(empty($codigo_tri)){

                    $codigo_tri = null;


                }

                $codigo_fixa = trim(substr($linha, 139, 11));


                if(empty($codigo_fixa)){

                    $codigo_fixa = null;

                }

                $codigo_movel = trim(substr($linha, 150, 11));


                if(empty($codigo_movel)){

                    $codigo_movel = null;

                }

                $tarifa_fixa = trim(substr($linha, 161, 1));


                if(empty($tarifa_fixa)){

                    $tarifa_fixa = null;
                    
                }

                $tarifa_movel = trim(substr($linha, 162, 1));


                if(empty($tarifa_movel)){

                    $tarifa_movel = null;

                }

                $prestadora_chamada = trim(substr($linha, 163, 50));


                if(empty($prestadora_chamada)){

                    $prestadora_chamada = null;
                    
                }


                $data_ativacao = trim(substr($linha, 213, 8));

                if(!empty($data_ativacao)){

                    $ano = substr($data_ativacao, 0, 4);
                    $mes = substr($data_ativacao, 4, 2);
                    $dia = substr($data_ativacao, 6, 2);
                    $data_ativacao = "$ano-$mes-$dia";

                } else {

                    $data_ativacao = null;

                }

                $data_desativacao = trim(substr($linha, 221, 8));

                if(!empty($data_desativacao)){

                    $ano = substr($data_desativacao, 0, 4);
                    $mes = substr($data_desativacao, 4, 2);
                    $dia = substr($data_desativacao, 6, 2);
                    $data_desativacao = "$ano-$mes-$dia";

                } else {

                    $data_desativacao = null;

                }

                $pessoa_sup = trim(substr($linha, 229, 100));


                if(empty($pessoa_sup)){

                    $pessoa_sup = null;

                }

                $telefone_sup = trim(substr($linha, 329, 10));

                if(empty($telefone_sup)){

                    $telefone_sup = null;

                }

                $email_sup = trim(substr($linha, 339, 50));

                if(empty($email_sup)){

                    $email_sup = null;

                }

                $remuneracao_fixa = trim(substr($linha, 389, 1));

                if(empty($remuneracao_fixa)){

                    $remuneracao_fixa = null;
                    
                }

                $nome_sup = trim(substr($linha, 390, 100));

                if(empty($nome_sup)){

                    $nome_sup = null;
                    
                }

                $remuneracao_movel = trim(substr($linha, 490, 1));

                if(empty($remuneracao_movel)){

                    $remuneracao_movel = null;
                    
                }

                $prestadora_sup = trim(substr($linha, 491, 50));

                if(empty($prestadora_sup)){

                    $prestadora_sup = null;
                    
                }


                $data_comunicacao = trim(substr($linha, 541, 8));

                if(!empty($data_comunicacao)){

                    $ano = substr($data_comunicacao, 0, 4);
                    $mes = substr($data_comunicacao, 4, 2);
                    $dia = substr($data_comunicacao, 6, 2);
                    $data_comunicacao = "$ano-$mes-$dia";

                } else {

                    $data_comunicacao = null;

                }

                $tipo_servico = trim(substr($linha, 549, 40));

                if(empty($tipo_servico)){

                    $tipo_servico = null;
                    
                }

                // Chamada do método para passagem dos dados na classe de manipulação do Banco de Dados.
                $this->inserirDados($regiao, $uf, $cn, $cnl_municipio, $descricao_municipio, $cnl_localidade, $descricao_localidade, $bairro, $codigo_tri, $codigo_fixa, $codigo_movel, $tarifa_fixa, $tarifa_movel, $prestadora_chamada, $data_ativacao, $data_desativacao, $pessoa_sup, $telefone_sup, $email_sup, $remuneracao_fixa, $nome_sup, $remuneracao_movel, $prestadora_sup, $data_comunicacao, $tipo_servico);

                // Chamada do método para inserção de manipulação no Banco de Dados.
                $this->adicionarCampos();

            }

            // Fechamos o arquivo CSV.
            fclose($arquivo);

            // Desconectamos o Banco de Dados.
            $this->desconectarBanco();

            // Mensagem de sucesso.
            echo "Arquivos inseridos com sucesso!";

        }

    }

    // Objeto criado para inicializar o projeto.
    $csv = new CSV();

    // Chamada do método com a passa do arquivo CSV para leitura e manipulação dos dados no Banco.
    $csv->manipularCSV('Arquivos/tabela.csv');

?>