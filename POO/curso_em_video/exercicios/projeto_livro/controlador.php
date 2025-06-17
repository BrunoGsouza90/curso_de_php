<?php

    interface livroControlador{

        public function abrirLivro();
        public function fecharLivro();
        public function folhearLivro();
        public function avancarPagina($paginas);
        public function voltarPagina($paginas);

    }

?>