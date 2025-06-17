<?php

    // Arquivo criado para funções usadas no projeto.

    // Função usada para remover acentuações de strings.
    function removerAcentuacao($linha){

        $acentuacoes = [

            "á" => "a",
            "é" => "e",
            "í" => "i",
            "ó" => "o",
            "ú" => "u",

            "Á" => "A",
            "É" => "E",
            "Ó" => "O",
            "Ú" => "U",

            "â" => "a",
            "ê" => "e",
            "î" => "i",
            "ô" => "o",
            "û" => "u",
        
            "Â" => "A",
            "Ê" => "E",
            "Î" => "I",
            "Ô" => "O",
            "Û" => "U",

            "ã" => "a",
            "ẽ" => "e",
            "ĩ" => "i",
            "õ" => "o",
            "ũ" => "u",

            "Ã" => "A",
            "Ẽ" => "E",
            "Ĩ" => "I",
            "Õ" => "O",
            "Ũ" => "U",

            "ç" => "c"

        ];

        $linha_formatada = strtr($linha, $acentuacoes);

        return $linha_formatada;

    }

?>