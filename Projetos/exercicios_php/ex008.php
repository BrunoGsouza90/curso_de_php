<?php
  
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $caminho = 'telefones.csv';
    $id_operadora = 1009;

    $arquivo = fopen($caminho, 'r');

    while (($linha = fgets($arquivo)) !== false){

        $ddd = substr($linha, 0, 2);
        $numero = substr($linha, 2, 10);

        $sql = "INSERT INTO dids (numero, DDD, operadora) VALUES ('$numero', '$ddd', '$id_operadora');";

        if ($conn->query($sql) == true){
            echo "Número $numero inserido com sucesso.<br>";
        } else {
            echo "Erro ao inserir o número $numero: " . $conn->error . "<br>";
        }

        echo "$sql <br><br>";
    }

    fclose($arquivo);
    
    $conn->close();

?>
