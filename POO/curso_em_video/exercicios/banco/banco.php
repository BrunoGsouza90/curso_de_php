<?php

    class Banco{

        public $numero;
        protected $tipo;
        private $dono;
        private $saldo;
        private $status;

        function __construct(){

            $this->saldo = 0;
            $this->status = false;

        }

        // ==========================================

        public function set_numero($numero){

            $this->numero = $numero;

        }

        public function get_numero(){

            return $this->numero;

        }

        public function set_tipo($tipo){

            $this->tipo = $tipo;

        }

        public function get_tipo(){

            return $this->tipo;

        }

        public function set_dono($dono){

            $this->dono = $dono;

        }

        public function get_dono(){

            return $this->dono;

        }

        public function set_saldo($saldo){

            $this->saldo = $saldo;

        }

        public function get_saldo(){

            return $this->saldo;

        }

        public function set_status($status){

            $this->status = $status;

        }

        public function get_status(){

            return $this->status;

        }

        // ==========================================

        public function abrirConta($tipo){

            if($this->get_status() == true){

                echo "A conta já está aberta!<br>";

            } else {

                if($this->get_tipo() == $tipo){

                    $this->set_saldo(50);
                    $this->set_status(true);
                    echo "Conta corrente criada com sucesso!<br>";
 
                } else {

                    $this->set_saldo(150);
                    $this->set_status(true);
                    echo "Conta poupança criada com sucesso!<br>";
                
                }

            }

        }

        // ==========================================

        public function fecharConta(){

            if($this->status == false){

                echo "Usuário não tem conta!<br>";

            } else {

                if($this->get_saldo() > 0){

                    echo "Para o fechamento da conta o saldo precisará estar zerado, faça um desposito no valor de R$ " . $this->get_saldo() . ",00!<br>";

                } else {

                    $this->set_status(false);
                    echo "Conta fechada com sucesso!<br>";

                }

            }
        }

        // ==========================================

        public function depositar($valor){

            if($this->get_status() == false){

                echo "O usuário não tem uma conta em aberto!";

            } else {

                $this->get_saldo($this->get_saldo() - $valor);
                echo "Deposito realizado com sucesso! O valor na conta agora é de R$ " . $this->get_saldo() . ",00.<br>";

            }

       }

       // ==========================================

        public function sacar($valor){

            if($this->get_status() == false){

                echo "O usuario não tem uma conta em aberto!<br>";

            } else {

                if($valor > $this->get_saldo()){

                    echo "Saldo insuficente para saque!<br>";

                } else {

                    $this->set_saldo($this->get_saldo() - $valor);
                    echo "Saque realizado com sucesso! O valor na sua conta atualizado é de R$ " . $this->get_saldo() . ",00. <br>";

                }

            }

       }

       // ==========================================

       public function pagarMensalidade(){

            if($this->get_status() == false){

                echo "O usuario não tem uma conta em aberto!<br>";
                
            } else {

                if($this->get_saldo() < 100){

                    echo "Saldo insuficiente para pagamento da mensalidade!<br>";

                } else {

                    $this->set_saldo($this->get_saldo() - 100);
                    echo "Pagamento da mensalidade realizado com sucesso. O valor atualizado da sua conta é de R$ " . $this->get_saldo() . ",00 <br>";

                }

            }

       }

    }

?>