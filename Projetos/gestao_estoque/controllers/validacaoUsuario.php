<?php

    // Arquivo para validação de usuários.

    include_once 'config/database.php';
    include_once 'config/constantes.php';
    include_once 'models/Usuarios.php';

    // Classe responsável pela validação dos usuários vindos do formulário.
    class validacaoUsuario extends ConexaoBanco{

        private $id;
        private $type;
        private $nome;
        private $email;
        private $senha;
        private $repetir_senha;
        private $nivel_de_acesso;
        private $ativo;
        
        public $mensagens = [

            'sucesso' => [],
            'erro' => []

        ];

        function __construct($id = null, $type = null, $email = null, $senha = null, $repetir_senha = null, $nome = null, $nivel_de_acesso = null, $ativo = null){

            $this->set_id($id);
            $this->set_type($type);
            $this->set_nome($nome);
            $this->set_email($email);
            $this->set_senha($senha);
            $this->set_repetir_senha($repetir_senha);
            $this->set_nivel_de_acesso($nivel_de_acesso);
            $this->set_ativo($ativo);

        }

        public function set_id($id){

            $this->id = $id;

        }

        public function get_id(){
        
            return $this->id;

        }

        public function set_type($type){

            $this->type = $type;

        }

        public function get_type(){

            return $this->type;

        }

        public function set_nome($nome){

            $this->nome = $nome;

        }

        public function get_nome(){

            return $this->nome;

        }

        public function set_email($email){

            $this->email = $email;

        }

        public function get_email(){

            return $this->email;

        }

        public function set_senha($senha){

            $this->senha = $senha;

        }

        public function get_senha(){

            return $this->senha;

        }

        public function set_repetir_senha($repetir_senha){

            $this->repetir_senha = $repetir_senha;

        }

        public function get_repetir_senha(){

            return $this->repetir_senha;

        }

        public function set_nivel_de_acesso($nivel_de_acesso){

            $this->nivel_de_acesso = $nivel_de_acesso;

        }

        public function get_nivel_de_acesso(){

            return $this->nivel_de_acesso;

        }

        public function set_ativo($ativo){

            $this->ativo = $ativo;

        }

        public function get_ativo(){

            return $this->ativo;

        }

        // ==============================================

        // Métodos responsáveis pela validação dos campos vindos do formulário.

        public function verificarEmail(){

            if(empty($this->get_email())){

                $erro = 'Por favor preencha o campo "Email"!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strpbrk($this->get_email(), CARACTERES_ESPECIAS_EMAIL)){

                $erro = 'O campo "Email" não aceita caracteres especiais!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strlen($this->get_email()) > 150){

                $erro = 'O campo "Email" é muito longo!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(!filter_var($this->get_email(), FILTER_VALIDATE_EMAIL)){

                $erro = 'Padrão de Email incorreto!';

                array_push($this->mensagens['erro'], $erro);

            }

            if($this->get_type() == 'register' || $this->get_type() == 'edit'){

                $this->conectarBanco();

                $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");

                $email = $this->get_email();

                $sql->bindParam(":email", $email);

                $sql->execute();

                $usuario = $sql->fetch(PDO::FETCH_ASSOC);

                if(!empty($usuario)){

                    $erro = 'Esse email já está cadastrado no sistema!';

                    array_push($this->mensagens['erro'], $erro);

                }

                $this->desconectarBanco();

            }

            if($this->get_type() == 'login'){

                $this->conectarBanco();

                $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");

                $email = $this->get_email();

                $sql->bindParam(":email", $email);

                $sql->execute();

                $usuario = $sql->fetch(PDO::FETCH_ASSOC);

                if(empty($usuario)){

                    $erro = 'Esse email não está cadastrado!';

                    array_push($this->mensagens['erro'], $erro);

                }

                $this->desconectarBanco();

            }

        }

        public function verificarSenha(){

            if(empty($this->get_senha())){

                $erro = 'Por favor preencha o campo "Senha"!';

                array_push($this->mensagens['erro'], $erro);

            }

            if(strlen($this->get_senha()) > 150){

                $erro = 'O campo "Senha" é muito longo!';

                array_push($this->mensagens['erro'], $erro);

            }

            if($this->get_type() == 'register' || $this->get_type() == 'edit'){

                if($this->get_senha() != $this->get_repetir_senha()){

                    $erro = 'Por favor os campos "Senha" e "Repetir senha" devem ser iguais!';

                    array_push($this->mensagens['erro'], $erro);

                }

                if($this->get_senha()){

                    if(!strpbrk($this->get_senha(), CARACTERES_ESPECIAS)){

                        $erro = 'Por favor o campo "Senha" precisa ter ao menos 1 Caracteter Especial';

                        array_push($this->mensagens['erro'], $erro);

                    }

                    if(!strpbrk($this->get_senha(), '123456789')){

                        $erro = 'O campo "Senha" precisa ter ao menos um número!';

                        array_push($this->mensagens['erro'], $erro);

                    }

                    if(!strpbrk($this->get_senha(), ALFABETO)){

                        $erro = 'O campo "Senha" precisa ter ao menos uma letra!';

                        array_push($this->mensagens['erro'], $erro);

                    }

                }

            } else if($this->get_type() == 'login'){

                $this->conectarBanco();

                $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");

                $email = $this->get_email();
                
                $sql->bindParam(":email", $email);

                $sql->execute();

                $usuario = $sql->fetch();

                $senha = $this->get_senha();

                $hash = $usuario['senha'];

                if(!password_verify($senha, $hash)){

                    $erro = 'O campo "Senha" está incorreto!';

                    array_push($this->mensagens['erro'], $erro);

                }

            }

        }

        // ==============================================

        // Método responsável pela chamada das avaliações dos campos do formulário e chamada dos objetos de manipulação no Banco de Dados.

        public function manage(){

            if($this->get_type() == 'register' || $this->get_type() == 'edit' || $this->get_type() == 'login'){

                $this->verificarEmail();
                $this->verificarSenha();

            }

            if($this->mensagens['erro'] == null){

                if($this->get_type() == 'register'){

                    $nome = $this->get_nome();
                    $email = $this->get_email();
                    $senha = $this->get_senha();
                    $nivel_de_acesso = $this->get_nivel_de_acesso();
                    $ativo = $this->get_ativo();

                    $novo_usuario = new Usuarios(null, $nome, $email, $senha, $nivel_de_acesso, $ativo);

                    $novo_usuario->criarUsuario();

                    session_start();

                    $_SESSION['user'] = $nome;
                    $_SESSION['email'] = $email;
                    $_SESSION['nivel_de_acesso'] = $nivel_de_acesso;
                    $_SESSION['ativo'] = $ativo;

                    header("Location: " . BASE_URL . "/home.php");

                } else if($this->get_type() == 'edit'){

                    $id = $this->get_id();
                    $nome = $this->get_nome();
                    $email = $this->get_email();
                    $senha = $this->get_senha();
                    $nivel_de_acesso = $this->get_nivel_de_acesso();
                    $ativo = $this->get_ativo();

                    $editar_usuario = new Usuarios($id, $nome, $email, $senha, $nivel_de_acesso, $ativo);

                    $mensagens = $editar_usuario->editarUsuario();

                } else if($this->get_type() == 'delete'){

                    $id = $this->get_id();

                    $deletar_usuario = new Usuarios($id);

                    $deletar_usuario->excluirUsuario();

                } else if($this->get_type() == 'login'){

                    $sql = $this->conn->prepare("SELECT * FROM usuarios WHERE email = :email");

                    $email = $this->get_email();

                    $sql->bindParam(":email", $email);

                    $sql->execute();

                    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

                    session_start();

                    $_SESSION['user'] = $usuario['nome'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['nivel_de_acesso'] = $usuario['nivel_de_acesso'];
                    $_SESSION['ativo'] = $usuario['ativo'];

                    header('Location: ' . BASE_URL . '/home.php');

                }

            }

            array_push($this->mensagens['sucesso'], $mensagens['sucesso']);
            array_push($this->mensagens['erro'], $mensagens['erro']);

        }

    }

?>