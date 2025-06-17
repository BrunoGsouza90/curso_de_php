<?php

    class Caneta{

        var $modelo;
        var $cor;
        var $ponta;
        var $carga;
        var $tampada;

        function rabiscar(){

            if($this->tampada == true){

                echo "<p>Não posso rabiscar a caneta está tampada!</p>";

            } else {

                echo "<p>Estou rabiscando...</p>";

            }

        }

        function tampar(){

            $this->tampada = true;
            echo "Caneta tampada!";

        }

        function destampar(){

            $this->tampada = false;
            echo "Caneta destampada!";

        }

    }

?>