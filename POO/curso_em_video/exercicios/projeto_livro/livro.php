<?php

    require_once 'controlador.php';

    class Livro implements livroControlador{

        private $titulo;
        private $autor;
        private $total_paginas;
        private $pagina_atual;
        private $aberto;
        private $leitor;

        function __construct($titulo, $autor, $total_paginas, $leitor){

            $this->set_titulo($titulo);
            $this->set_autor($autor);
            $this->set_total_paginas($total_paginas);
            $this->set_pagina_atual(0);
            $this->set_aberto(false);
            $this->set_leitor($leitor);
            echo str_repeat("=", 35);

        }

        public function set_titulo($titulo){

            $this->titulo = $titulo;

        }

        public function get_titulo(){

            return $this->titulo;

        }

        public function set_autor($autor){

            $this->autor = $autor;

        }

        public function get_autor(){

            return $this->autor;

        }

        public function set_total_paginas($total_paginas){

            $this->total_paginas = $total_paginas;

        }

        public function get_total_paginas(){

            return $this->total_paginas;

        }

        public function set_pagina_atual($pagina_atual){

            $this->pagina_atual = $pagina_atual;

        }

        public function get_pagina_atual(){

            return $this->pagina_atual;

        }

        public function set_aberto($aberto){

            $this->aberto = $aberto;

        }

        public function get_aberto(){

            if($this->aberto == true){

                return 'Aberto';

            } else {

                return 'Fechado';

            }

        }

        public function set_leitor($leitor){

            $this->leitor = $leitor;

        }

        public function get_leitor(){

            return $this->leitor;

        }
        
        // ==========================================

        public function detalhes(){

            echo "<h2>". $this->get_titulo() . "</h2>";
            echo "<p>Escrito por " . $this->get_autor() . ".</p>";
            echo "<p>STATUS : " . $this->get_aberto() . ".</p>";
            echo "<p>Páginas: " . $this->get_pagina_atual() . " / " . $this->get_total_paginas() . ".</p>";
            echo "Quem está lendo esse livro é o " . $this->get_leitor() . ".</p>.";
            echo str_repeat("=", 35);

        }

        public function abrirLivro(){

            if($this->get_aberto()  == 'Aberto'){

                echo "<p>O livo já está aberto!</p><br>";
                echo str_repeat("=", 35);

            } else {

                $this->set_aberto(true);
                echo "<p>Abrindo o livro...<br>Livro aberto com sucesso!</p>";
                echo str_repeat("=", 35);

            }

        }

        public function fecharLivro(){

            if($this->get_aberto() == 'Fechado'){

                echo "<p>O livo já está fechado!</p>";
                echo str_repeat("=", 35);

            } else {

                $this->set_aberto(true);
                echo "<p>Fechando o livro...<br>Livro fechado com sucesso!</p>";
                echo str_repeat("=", 35);

            }

        }

        public function avancarPagina($paginas){

            echo "<p>Avançando $paginas páginas...</p>";

            if($this->get_pagina_atual() + $paginas > 280){

                $this->set_pagina_atual(280);

            } else {

                $this->set_pagina_atual($this->get_pagina_atual() + $paginas);

            }

            echo "<p>Páginas: " . $this->get_pagina_atual() . " / " . $this->get_total_paginas() . ".</p>";
            echo str_repeat("=", 35);

        }

        public function voltarPagina($paginas){

            echo "<p>Voltando $paginas páginas...</p>";

            if($this->get_pagina_atual() - $paginas < 0){

                $this->set_pagina_atual(0);

            } else {

                $this->set_pagina_atual($this->get_pagina_atual() - $paginas);

            }

            echo "<p>Páginas: " . $this->get_pagina_atual() . " / " . $this->get_total_paginas() . ".</p>";
            echo str_repeat("=", 35);

        }

    }

?>