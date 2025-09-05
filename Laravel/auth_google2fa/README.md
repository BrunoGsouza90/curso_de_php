# Projeto Laravel

Projeto para o teste de conhecimento na linguagem PHP e no framework PHP Laravel.

# Proposito

Esse projeto tem a finalidade de testar meus conhecimentos em PHP e no Framework PHP Laravel. Aqui trataremos alguns pontos importantes no uso do framework como: Migrations, Seeders, Models, Middleware, Controllers, Request, Views.
Neste projeto serão implementados seeders para a inicialização do projeto, até a autenficação do usuário e o uso de ORM.

# Instalacao

Para inicializar o projeto faremos o clone do repositório do projeto.
No arquivo .env na pasta raiz do projeto, faremos a alteração dos dados do Banco de Dados:

**DB_CONNECTION=mysql  
DB_HOST= localhost  
DB_PORT= 3306  
DB_DATABASE= projeto_laravel  
DB_USERNAME= root  
DB_PASSWORD= root**  

Após isso inicalizaremos o projeto com suas migrações e seeders:

```
php artisan migrate --seed
```

No terminal será liberado uma senha para o usuário principal **admin**, e seu email padrão sendo, **admin@gmail.com**.

# Pre-requisitos

Este script para sua execucao necessita de um banco de dados mysql com credencial de root, uma vez que para facilitar o mesmo realiza o processo de criacao do banco, as credenciais devem ser alimentadas no arquivo **.env**.
O projeto está na versão 11 do Framework Laravel, sendo necessário o PHP 8.2 +.

# Execucao

A execucao deste script se da através da execução do arquivo **artisan.php**
```
 php artisan serve
```