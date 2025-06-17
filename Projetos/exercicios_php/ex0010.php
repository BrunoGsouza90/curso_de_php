<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 10</title>
</head>
<body>

    <h1>Exercício 10</h1>

    <?php

    $carros = [
        "0" => [
        "Marca" => "Fiat",
        "Modelo" => "Uno",
        "Ano"
        => 2012,],
        "1" => [
        "Marca" => "VW",
        "Modelo" => "Gol",
        "Ano"
        => 1998,
        ],
        "2" => [
        "Marca" => "GM",
        "Modelo" => "Onix",
        "Ano"
        => 2022,
        ],
        "3" => [
        "Marca" => "VW",
        "Modelo" => "Fusca",
        "Ano"
        => 1970,
        ],
        "4" => [
        "Marca" => "Fiat",
        "Modelo" => "Strada",
        "Ano"
        => 2015,
        ],
        "5" => [
        "Marca" => "Ford",
        "Modelo" => "Camaro",
        "Ano"
        => 2002,
        ],
        "6" => [
        "Marca" => "VW",
        "Modelo" => "Brasilia",
        "Ano"
        => 1985,
        ],
        "7" => [
        "Marca" => "VW",
        "Modelo" => "Kombi",
        "Ano"
        => 1978,
        ],
        "8" => [
        "Marca" => "VW",
        "Modelo" => "Fusca",
        "Ano"
        => 1978,
        ],
        "9" => [
        "Marca" => "VW",
        "Modelo" => "Fusca",
        "Ano"
        => 1988,
        ],

    ];

    $marcas = array_column($carros, "Marca");
    $quantidade_de_marcas = count(array_unique($marcas));

    $quantidade_de_veiculos = count($carros);

    foreach ($carros as $carro) {
        $ano = $carro["Ano"];
        $decada = floor($ano / 10) * 10;

        if (!isset($veiculosPorDecada[$decada])) {
            $veiculosPorDecada[$decada] = 0;
        }

        $veiculosPorDecada[$decada]++;
    }

    echo "Quantidade de marcas: $quantidade_de_marcas.<br><br>";

    echo "Quantidade de veículos: $quantidade_de_veiculos.<br><br>";

    echo "<strong>Quantidade de veículos por década:</strong><br>";
    foreach ($veiculosPorDecada as $decada => $quantidade) {
        echo "Década $decada: $quantidade veículos<br>";
    }
        
    ?>    

</body>
</html>