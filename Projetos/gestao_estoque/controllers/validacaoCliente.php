<?php

    // Arquivo para validação de clientes.

    include_once 'config/constantes.php';
    include_once 'validacoes.php';
    include_once 'models/Clientes.php';
    include_once 'helpers/interfaces.php';

    // Classe responsável pela validação dos clientes vindos do formulário.
    class ValidacaoCliente extends ConexaoBanco implements interfaceValidarCliente{

        // Abstração da classe de validações dos StakeHolders.
        use ValidacoesStakeHolders;

        public $mensagens = [

            'sucesso' => [],
            'erro' => []

        ];

        function __construct($id = null, $type = null, $razaosocial = null, $cnpj_cpf = null, $rua = null, $numero = null, $bairro = null, $cep = null, $estado = null, $telefone = null, $email = null, $nascimento = null, $profissao = null, $sexo = null){

            $this->set_id($id);
            $this->set_razaosocial(trim($razaosocial));
            $this->set_cnpj_cpf(trim($cnpj_cpf));
            $this->set_rua(trim($rua));
            $this->set_numero(trim(strtoupper($numero)));
            $this->set_bairro(trim($bairro));
            $this->set_cep(trim($cep));
            $this->set_estado(trim($estado));
            $this->set_telefone(trim($telefone));
            $this->set_email(trim($email));
            $this->set_nascimento($nascimento);
            $this->set_profissao($profissao);
            $this->set_sexo($sexo);
            $this->set_type($type);

        }

        // Métodos responsáveis pela validação dos campos vindos do formulário.

        public function validarRazaosocial(){

            if(empty($this->get_razaosocial())){

                $erro = 'O campo "Razão Social" é obrigatório!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_razaosocial(), CARACTERES_ESPECIAS)){

                $erro = 'O campo "Razão Social" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strlen($this->get_razaosocial()) > 45){

                $erro = 'O campo "Razão Social" é muito grande!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validar_Cnpj_cpf(){

            $validador = true;

            if(strlen($this->get_cnpj_cpf()) == 11){

                $cpf = preg_replace( '/[^0-9]/is', '', $this->get_cnpj_cpf());
            
                for($t = 9; $t < 11; $t++){

                    for($d = 0, $c = 0; $c < $t; $c++){

                        $d += $cpf[$c] * (($t + 1) - $c);

                    }

                    $d = ((10 * $d) % 11) % 10;

                    if($cpf[$c] != $d){

                        $validador =  false;

                    }

                }

                if($validador == false){

                    $erro = 'O campo "CNPJ / CPF" é inválido!';
    
                    array_push($this->mensagens['erro'], $erro);

                }

            } else if(strlen($this->get_cnpj_cpf()) == 14){
                    
                $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

                for($i = 0, $n = 0; $i < 12; $n += $this->get_cnpj_cpf()[$i] * $b[++$i]);

                if($this->get_cnpj_cpf()[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)){

                    $validador = false;

                }
                
                for($i = 0, $n = 0; $i <= 12; $n += $this->get_cnpj_cpf()[$i] * $b[$i++]);

                if($this->get_cnpj_cpf()[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)){

                    $validador = false;

                }

                if($validador == false){

                    $erro = 'O campo "CNPJ / CPF" é inválido!';
    
                    array_push($this->mensagens['erro'], $erro);

                }

            } else if(strpbrk($this->get_cnpj_cpf(), CARACTERES_ESPECIAS)){
            
                $erro = 'O campo "CPF / CNPJ" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            
            } else if(strpbrk($this->get_cnpj_cpf(), ALFABETO)){
            
                $erro = 'O campo "CPF / CNPJ" não aceita letras!';

                array_push($this->mensagens['erro'], $erro);

            } else {

                $erro = 'O campo "CPF / CNPJ" não possui a quantidade de caracteres válida!';

                array_push($this->mensagens['erro'], $erro);

            }
        
        }

        public function validarRua(){

            if(strlen($this->get_rua()) > 95){

                $erro = 'O campo "Rua" é muito grande!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_rua(), CARACTERES_ESPECIAS)){

                $erro = 'O campo "Rua" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(!is_string($this->get_rua()) || strpbrk($this->get_rua(), '123456789')){

                $erro = 'O campo "Rua" não aceita números!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validarNumero(){

            if(strpbrk($this->get_numero(), CARACTERES_ESPECIAS)){

                $erro = 'O campo "Número" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_numero(), ALBETO_NUMERO)){

                $erro = 'O campo "Número" aceita apenas a letra "A" como referência da casa da frente e letra "B" como referência da casa do fundo!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validarBairro(){

            if(strlen($this->get_bairro()) > 25){

                $erro = 'O campo "Bairro" é muito grande!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_bairro(), CARACTERES_ESPECIAS)){

                $erro = 'O campo "Bairro" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_bairro(), '123456789')){

                $erro = 'O campo "Bairro" não aceita números!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validarCep(){

            if(strlen($this->get_cep()) != 8){

                $erro = 'O campo "CEP" está com o tamanho inválido!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_cep(), CARACTERES_ESPECIAS)){

                $erro = 'O campo "CEP" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_cep(), ALFABETO)){

                if(strpbrk($this->get_bairro(), CARACTERES_ESPECIAS)){

                    $erro = 'O campo "CEP" não aceita letras!';

                    array_push($this->mensagens['erro'], $erro);
    
                }

            }

        }

        public function validarTelefone(){

            if(empty($this->get_telefone())){

                $erro = 'O campo "Telefone" é obrigatório!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_telefone(), ALFABETO)){

                $erro = 'O campo "Telefone" não aceita letras!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strlen($this->get_telefone()) != 10 && strlen($this->get_telefone()) != 11){

                $erro = 'O campo "Telefone" tem o tamanho inválido!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_telefone(), CARACTERES_ESPECIAS)){

                $erro = 'O campo "Telefone" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validarEmail(){

            if($this->get_type() == 'create'){
                    
                $this->conectarBanco();

                $this->set_sql($this->conn->prepare("SELECT * FROM clientes WHERE email = :email"));

                $email = $this->get_email();

                $this->get_sql()->bindParam('email', $email);

                $this->get_sql()->execute();

                $clientes = $this->get_sql()->fetch(PDO::FETCH_ASSOC);

                if(!empty($clientes)){

                    $erro = 'Email já cadastrado no sistema!';

                    array_push($this->mensagens['erro'], $erro);

                }

                $this->desconectarBanco();

            }

            if (strlen($this->get_email()) > 45){

                $erro = 'O campo "Email" é muito grande!';

                array_push($this->mensagens['erro'], $erro);

            }
            
            if (strpbrk($this->get_email(), CARACTERES_ESPECIAS_EMAIL)){

                $erro = 'O campo "Email" não aceita caracteres especiais.';

                array_push($this->mensagens['erro'], $erro);

            }
            
            if(strpbrk($this->get_email(), '123456789') || !is_string($this->get_email())){

                $erro = 'O campo "Email" não pode ter números!';

                array_push($this->mensagens['erro'], $erro);

            }
            
            if(!filter_var($this->get_email(), FILTER_VALIDATE_EMAIL)){

                $erro = 'Padrão de Email incorreto!';

                array_push($this->mensagens['erro'], $erro);

            }

        }

        public function validarProfissao(){

            if(strpbrk($this->get_profissao(), '123456789')){

                $erro = 'O campo "Profissão" não aceita números!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_profissao(), CARACTERES_ESPECIAS)){

                $erro = 'O campo "Profissão" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);
                
            }

        }

        // ==============================================

        // Método responsável pela chamada das avaliações dos campos do formulário e chamada dos objetos de manipulação no Banco de Dados.

        public function manage(){

            if($this->get_type() == 'create' || $this->get_type() == 'edit'){
                
                $this->validarRazaosocial();
                $this->validar_Cnpj_cpf();
                $this->validarRua();
                $this->validarNumero();
                $this->validarBairro();
                $this->validarCep();
                $this->validarTelefone();
                $this->validarEmail();
                $this->validarProfissao();

            }

            if($this->mensagens['erro'] == null){

                if($this->get_type() == 'create' || $this->get_type() == 'edit'){
                    
                    $razaosocial = $this->get_razaosocial();
                    $cnpj_cpf = $this->get_cnpj_cpf();
                    $rua = $this->get_rua();
                    $numero = $this->get_numero();
                    $bairro = $this->get_bairro();
                    $cep = $this->get_cep();
                    $estado = $this->get_estado();
                    $telefone = $this->get_telefone();
                    $email = $this->get_email();
                    $nascimento = $this->get_nascimento();
                    $profissao = $this->get_profissao();
                    $sexo = $this->get_sexo();

                    if($this->get_type() == 'create'){

                        $novo_cliente = new Clientes(null, $razaosocial, $cnpj_cpf, $rua, $numero, $bairro, $cep, $estado, $telefone, $email, $nascimento, $profissao, $sexo);
    
                        $mensagens = $novo_cliente->criarCliente();
    
                    } else if ($this->get_type() == 'edit'){

                        $id = $this->get_id();
    
                        $editar_cliente = new Clientes($id, $razaosocial, $cnpj_cpf, $rua, $numero, $bairro, $cep, $estado, $telefone, $email, $nascimento, $profissao, $sexo);
    
                        $mensagens = $editar_cliente->editarCliente();
    
                    }

                } else if($this->get_type() == 'delete') {

                    $id = $this->get_id();

                    $excluir_cliente = new Clientes($id);

                    $mensagens = $excluir_cliente->excluirCliente();

                }

                array_push($this->mensagens['sucesso'], $mensagens['sucesso']);
                array_push($this->mensagens['erro'], $mensagens['erro']);

            }

        }

  }

?>