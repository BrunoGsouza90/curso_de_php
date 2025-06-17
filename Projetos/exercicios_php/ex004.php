<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>

    <style>

        fieldset{

            padding: 10px;

        }

        button{

            display: block;
            margin-top: 10px;

        }

    </style>

</head>
<body>

    <h1>Exerício 4</h1>
    
    <form action="ex004.1.php" method="POST" autocomplete="on">

        <fieldset>

            <legend>Estado brasileiro</legend>

            <label for="iestado">Estado:</label>
            <select name="estado" id="iestado">

                <option value="" selected>--Escolha--</option>

                <optgroup label="Região Norte">
                    <option value="AC">Acre</option>
                    <option value="AL">Amazonas</option>
                    <option value="AP">Amapá</option>
                    <option value="PA">Pará</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="TO">Tocantins</option>
                </optgroup>

                <optgroup label="Região Nordeste">
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="MA">Maranhão</option>
                    <option value="PB">Paraíba</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="SE">Sergipe</option>
                </optgroup>

                <optgroup label="Região Centro-Oeste">
                    <option value="GO">Goiás</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                </optgroup>

                <optgroup label="Região Sudeste">
                    <option value="ES">Espírito Santo</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="SP">São Paulo</option>
                </optgroup>

                <optgroup label="Região Sul">
                    <option value="PR">Paraná</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="SC">Santa Catarina</option>
                </optgroup>
                
                <optgroup label="Região Norte">
                    <option value="DF">Distrito Federal</option>
                </optgroup>

            </select>

            <button type="submit">Enviar</button>

        </fieldset>

    </form>

</body>
</html>