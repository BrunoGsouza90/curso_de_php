# Projeto SUP

Esse projeto foi feito para a manipulação de dados vindos de um arquivo CSV, onde a cada linha os dados estão separados em determinadas posições na string. A posição das informação para cada campo está descrita na coluna Offset do arquivo **"Layout.pdf"**.
    
**_Para rodar o projeto usamos o seguintes containers Docker:_**
    
>PHP -> [richarvey/nginx-php-fpm:latest](https://ithub.com/richarvey/nginx-php-fpm)  
>MYSQL -> [mariadb:latest](https://hub.docker.com/_/mariadb)

<br>

**_No projeto temos 5 arquivos PHP:_**

constantes.php => _É o arquivo responsável pela declaração das constantes usadas no arquivo **"database.php"** na conexão com o Banco de Dados._

database.php => _É o arquivo responsável pela conexão com o Banco de Dados._

funcoes.php => _É o arquivo onde está declarada a função para remoção das acentuações vindas do arquivo CSV. É necessário remover as acentuações pois eles são contados como caracteres em posições PHP, impossibilitando a leitura correta de cada Offset oferecido no **"Layout.pdf"**._

models.php => _É o arquivo onde declaramos a classe que será responsável pela manipulação dos dados vindos do arquivo CSV no Banco de Dados._

csv.php => _É o arquivo onde faremos a leitura dos dados de cada linha representada no arquivo **"tabela.csv"**; Removeremos todas as acentuações; Faremos as separações dos campos de acordo com seus tamanhos e posições demonstradas no arquivo **"Layout.pdf"** e após a separação sua chamada para manipulação no Banco de Dados._

Para rodar o projeto extrai o arquivo **"Arquivos.zip"** e confira se o nome da tabela CSV está em confirmidade com o nome passado no parâmetro do objeto CSV na __linha 295__ do arquivo **"csv.php"**. Após isso abra o terminal na pasta do projeto e digite o seguinte comando...

```
php csv.php
```
