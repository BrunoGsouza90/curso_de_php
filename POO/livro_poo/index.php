<?php

    echo "<h2>1.8.3 - Variáveis estáticas:</h2><hr>";


    /* 
        Neste exemplo a variável guarda o valor de todas as transações.
    */

    function percorre($quilometros){

        static $total;
        $total += $quilometros;
        echo "Percorreu mais $quilometros do total de $total.<br>";

    }

    percorre(100);
    percorre(200);
    percorre(50);

    echo "<hr><h2>1.8.4 - Passagem de parâmetros:</h2>";

    /*

        Aqui estamos treinando a passagem de parâmetros.

    */

    // Neste caso em específico o valor declarado fora da função é resetado.
    function Incrementa($variavel, $valor){

        $variavel += $valor;

    }

    $a = 10;
    Incrementa($a, 20);
    echo "$a <br>";

    // Neste caso em específico o valor da variável declarado fora da função é mantido.
    function Incrementa1(&$variavel, $valor){

    $variavel += $valor;

    }

    $a = 10;
    Incrementa1($a, 20);
    echo "$a <br>";

    // Quando definimos o valor no parâmetro não é necessário passar um valor necessariamente na chamada da função.
    function Incrementa2(&$variavel, $valor = 40){

        $variavel += $valor;

    }

    $a = 10 . "<br>";
    Incrementa2($a);
    echo "$a<br>";

    // Aqui estamos os parâmetros e a quantidade de parâmetros que foram passadas na chamada da função sem ter declarado estes na declaração da função.
    function Ola(){

        $argumentos = func_get_args();
        $quantidade = func_num_args();

        for($n = 0; $n < $quantidade; $n++){

            echo 'Olá ' . $argumentos[$n] . '.<br>';

        }

    }

    Ola('João', 'Maria', 'José', 'Pedro');

    echo "<hr><h2>1.8.5 - Recursão:</h2>";

    function Fatorial($numero){

        if($numero == 1){

            return $numero;

        } else {

            return $numero * Fatorial($numero - 1);

        }

    }

    echo "O Fatorial de 5 é : " .  Fatorial(5) . ".<br>";
    echo "O Fatorial de 7 é : " . Fatorial(7) . ".<br>";

    echo "<hr><h2>1.9 - Manipulação de arquivos e diretórios.</h2>";
    
    echo '<br>';
    
    // Aqui estamos lendo linha a linha de um arquivo.
    $arquivo = fopen("file.txt", "a+");

    $linhas = file('file.txt');

    foreach($linhas as $linha){

        echo "$linha <br>";

    }

    // Aqui estamos colocando contéudo dentro do arquivo.

    // Comentado para não adicionar código ao atualizar a página.
    // fwrite($arquivo, "<br> Adicionamos uma linha neste arquivo!");

    echo "<hr><h2>1.10 - Manipulação de Strings.</h2>";

    echo "<hr><h3>1.10.1 - Declaração.</h3>";

    /*
    
        Neste tópico estamos criando strings.

    */
    echo 'Texto.<br>';

    /*
    
        Neste tópico estamos criando strings.

    */
    $texto = 'Texto.';

    echo "<hr><h3>1.10.2 - Concactenação.</h3>";

    /*
    
        Neste tópico estamos concactenando strings.

    */
    $texto1 = 'Texto 1';
    $texto2 = 'Texto 2';
    
    echo "$texto1 | $texto2.<br>";
    echo $texto1 . "|" . $texto2 . '<br>';

    echo "<hr><h3>1.10.2 - Concactenação.</h3>";

    /*
    
        Aqui iremos verificar os caracteres de escape.

    */
    echo "Aqui estamos por exemplo usando \\ , \" e \$.<br>";

    echo "<hr><h3>1.10.3 - Funções.</h3>";

    /*
    
        Aqui iremos aprender sobre as funções de strings.

    */
    echo strtoupper('transformando texto em letras maisculas.<br>');
    
    echo strtolower('TRANSFORMANDO TEXTO EM LETRAS MINUSCULAS.<br>');

    $nome = 'Bruno Gonçalves de Souza';
    $primeiro_nome = substr($nome, 0, 5);

    echo "$primeiro_nome.<br>";

    $texto = 'Repetindo o texto.<br>';
    echo str_repeat($texto, 3);

    $texto = 'Bruno Gonçalves de Souza';
    $nome_sem_espaco = str_replace(' ', '', $nome);
    $quantidade_letras = strlen($nome_sem_espaco);

    echo "Seu nome tem $quantidade_letras letras.<br>";

    $posicao_segundo_nome = strpos($nome, 'Gonçalves');

    echo "O segundo nome está na posição $posicao_segundo_nome.<br>";

    $nome_invertido = strrev($nome);

    echo "$nome_invertido.<br>";

    echo "<hr><h2>1.11 - Manipulação de arrays.</h2>";

    echo "<hr><h3>1.11.1 - Criando um array.</h3>";

    /*
    
        Aqui neste tópico estamos criando um array.
        Podemos utilizar " array() " ou " [] ".

    */
    // Arrays sem chaves.
    $carros = [
        'Civic', 
        'Corolla', 
        'Camaro', 
        'Fusca', 
        'Onix'
    ];

    // Array com chave.
    $nomes = [
        0 => 'Bruno',
        1 => 'Lucas',
        2 => 'Bianca',
        3 => 'Jorge'
    ];

    // Para impressão dos arrays utilizamos o " foreach ".
    // Impressão do array.
    foreach($nomes as $chave => $valor){

        echo "$chave - $valor.<br>";

    }

    // Alterando um dos nomes do array.
    $nomes[2] = 'Sabrina';

    echo "Nome Bianca alterado para " . $nomes[2] . ".<br><br>";

    // Aqui estamos criando um array multidimensional.
    $pessoas = array(
        'Bruno' => array(
            'Idade' => '25 anos',
            'Profissão' => 'TI',
            'Nacionalidade' => 'Brasileiro'
        ),

        'Jorge' => array(
            'Idade' => '32 anos',
            'Profissao' => 'Médico',
            'Nacionalidade' => 'Americano'
        ),

        'Maria' => array(
            'Idade' => '19 anos',
            'Profissao' => 'Veterinária',
            'Nacionalidade' => 'Britânica'
        )
    );

    // Imprimindo o array multidimensional.
    foreach($pessoas as $pessoa => $caracterisca){

        echo "$pessoa:<br>";

        foreach($caracterisca as $chave_caracteristica => $valor_caracteristica){

            echo "$chave_caracteristica - $valor_caracteristica.<br>";

        }

        echo "<br>";

    }

    echo "<hr><h3>1.11.6 - Funções.</h3>";

    /*
    
        Neste tópico iremos ver algumas funções de array.

    */
    $carros = [];

    // Adicionando elementos no ínicio do array.
    array_unshift($carros, 'Onix');
    array_unshift($carros, 'Gol');
    
    // Adicionando elementos no final do array.
    array_push($carros, 'Corolla');
    array_push($carros, 'Civic');

    foreach($carros as $carro){

        echo "$carro.<br>";

    }

    echo "<br>";

    // Removendo primeiro elemento.
    array_shift($carros);

    foreach($carros as $carro){

        echo "$carro.<br>";

    }

    echo "<br>";

    // Removendo último elemento.
    array_pop($carros);

    foreach($carros as $carro){

        echo "$carro.<br>";

    }

    echo "<br>";

    // Invertendo array.
    $cores = array(
        'Azul', 
        'Vermelho', 
        'Verde', 
        'Amarelo'
    );

    $array_invertido = array_reverse($cores, true);
    
    foreach($array_invertido as $cor){

        echo "$cor.<br>";

    }
    
    echo "<br>";

    // Juntando arrays.
    $nomes1 = array(
        'Jorge',
        'Lucas',
        'Caio',
        'Jennifer',
        'Maria Luíza',
        'Eduardo'
    );

    $nomes2 = array(
        'Júlio',
        'Matheus',
        'Bianca',
        'Janete'
    );

    $nomes = array_merge($nomes1, $nomes2);

    foreach($nomes as $nome){

        echo "$nome.<br>";

    }

    echo "<br>";

    // Array com as chaves de outro array.
    $animais_peso = array(
        'Elefante' => '6.000 Kg',
        'TIgre' => '220 Kg',
        'Águia' => '6,3 Kg'
    );

    $animais = array_keys($animais_peso);

    foreach($animais as $animal){

        echo "$animal.<br>";

    }

    echo "<br>";

    // Cortando arrays.
    $cores = array(
        'Azul', 
        'Vermelho', 
        'Verde', 
        'Amarelo',
        'Roxo',
        'Vinho',
        'Laranja'
    );

    $primeiras_cores = array_slice($cores, 0, 3);

    foreach($primeiras_cores as $cor){

        echo "$cor.<br>";

    }

    echo "<br>";

    // Quantidade de elementos em um array.
    $quantidade_elementos = count($cores);

    echo "O array \"cores\" tem $quantidade_elementos elementos.<br><br>";

    // Verificando existência de um elemento no array.
    $cores = array(
        'Azul', 
        'Vermelho', 
        'Verde', 
        'Amarelo',
        'Roxo',
        'Vinho',
        'Laranja'
    );

    if(in_array('Azul', $cores)){

        echo "A cor está presente no array.<br><br>";

    } else {

        echo "A cor não está presente no array.<br><br>";

    }

    // Ordenando os valores de um array ordem crescente.
    $numeros = [99, 15, 0, 5, 6, 1, 44, 77];
    sort($numeros);

    foreach($numeros as $numero){

        echo "$numero ";

    }

    echo "<br>";

    // Ordenando os valores de um array ordem decrescente.
    $numeros = [99, 15, 0, 5, 6, 1, 44, 77];
    rsort($numeros);

    foreach($numeros as $numero){

        echo "$numero ";

    }

    echo "<br><br>";

    // Ordenando arrays associativos em ordem crescente.
    $cores = array(
        1 => 'Azul', 
        2 => 'Vermelho', 
        3 => 'Verde', 
        4 => 'Amarelo',
        5 => 'Roxo',
        6 =>'Vinho',
        7 => 'Laranja'
    );

    asort($cores);

    foreach($cores as $chave => $valor){

        echo "$chave - $valor.<br>";

    }

    echo "<br>";

    // Ordenando o array pelo valor das chaves.
    $cores = array(
        1 => 'Azul', 
        90 => 'Vermelho', 
        9 => 'Verde', 
        88 => 'Amarelo',
        5 => 'Roxo',
        10 =>'Vinho',
        7 => 'Laranja'
    );

    ksort($cores);

    foreach($cores as $chave => $valor){

        echo "$chave - $valor.<br>";

    }

    echo "<br>";

    // Separando arrays apartir de um associador.
    $data = '12/08/2000';
    $array_data = explode('/', $data);

    echo "$data.<br>";

    foreach($array_data as $data){

        echo "$data.<br>";

    }

    echo "<br>";

    // Criando strings com valores de um array com um associador.

    $array_nome = [
        'Bruno',
        'Gonçalves',
        'de',
        'Souza'
    ];

    $nome = implode(' ', $array_nome);

    echo "$nome.<br>";

    echo "<hr><h2>1.12 - Manipulação de objetos.</h2>";

    /*
    
        Aqui veremos como verificar e manipular dados de um determinado objeto.
    
    */
    // Array com as funções do objeto.
    class Funcionario{

        function SetandoSalario(){
            
        }

        function VisualizandoSalario(){
            
        }

        function SetandoNome(){
            
        }

        function VisuaizandoNome(){
            
        }

    }

    $funcionario = new Funcionario();
    $funcoes_funcionario = get_class_methods($funcionario);

    foreach($funcoes_funcionario as $funcoes){

        echo "$funcoes.<br>";

    }

    echo "<br>";

    // Retonando qual classe o objeto pertence.
    $jose = new Funcionario();
    
    $classe = get_class($jose);

    echo "O objeto \"jose\" pertence a classe \"$classe\".<br><br>";

    // Array associativo com o nome valor das propriedades setadas em um objeto.
    class Pessoa{

        public $nome = 'Bruno';
        public $idade = '25 anos';
        public $nacionalidade = 'Brasileiro';

    }

    $pessoa = new Pessoa();
    $propriedades_pessoa = get_class_vars(get_class($pessoa));

    foreach($propriedades_pessoa as $chave => $valor){

        echo "$chave => $valor.<br>";

    }

    echo "<br>";

    // Array com os valores de um objeto setado em determinada classe.
    class Carro{

        public $nome;
        public $velocidade_maxima;
        public $valor;

        public function __construct()
        {
            
        }

    }

    $civic = new Carro();

    $civic->nome = 'Civic';
    $civic->velocidade_maxima = '200km/h';
    $civic->valor = 'R$ 200.000,00';

    $dados_civic = get_object_vars($civic);

    foreach($dados_civic as $chave => $valor){

        echo "$chave => $valor.<br>";

    }

    echo "<br>";

    // Retornando a classe pai cujo o objeto pertence.
    class Carros1{



    }

    class Motor extends Carros1{



    }

    $v8 = new Motor();
    $classe_pai = get_parent_class($v8);

    echo "A classe \"v8\" pertence a classe pai \"$classe_pai\".<br><br>";

    // Aqui estamos verificando se determinado objeto pertence a determinada classe pai.
    // Obs.: Utilizaremos o mesmo objeto do exemplo acima.
    if(is_subclass_of($v8, 'Carros1')){

        echo "Sim o objeto pertence a classe \"Carros1\".<br><br>";

    } else {

        echo "O objeto não pertence a classe \"Carros1\".<br><br>";

    }
    
?>