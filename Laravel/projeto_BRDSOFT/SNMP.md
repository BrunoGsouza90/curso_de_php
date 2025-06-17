# Projeto SNMP

Projeto implementado para controle e monitoramento SNMP.

# Proposito

Esse projeto tem a finalidade de prototipar o lado frontend de uma Aplicação Laravel, renderizando em si os gráficos de monitoramento e controle SNMP de um servidor. Apresentando os monitoramentos de "Uso de CPU", "Memória Física", "IfInOctets", "Memória SWAP", "Opensips", "Rip Engine".
A parte backend será feita no Laravel e por meio do vite trataremos um módulo específico para gráficos utilizando a biblioteca JavaScript Chart.js.

Acesse: [Biblioteca Chart.js](https://www.chartjs.org/).

# Instalacao

No terminal do projeto instalaremos o Chart.js.



    npm install chart.js


Agora atualizaremos o Vite:

    npm run build
    
Em **"resources/app.js"** importaremos o ChartJS:

    import './chart.js'
    
Criamos o arquivo **"chart.js"** e atualizaremos o contéudo.

Faremos o mesmo com a API da controller.

**Obs.:** O projeto será clonado diretamente do repositório do cliente então específicaremos apenas a parte de instalação do frontend.

# Pre-requisitos

Este script para sua execucao necessita de um banco de dados mysql com credencial de root, uma vez que para facilitar o mesmo realiza o processo de criacao do banco, as credenciais devem ser alimentadas no arquivo **.env**.
O projeto está na versão 11 do Framework Laravel, sendo necessário o PHP 8.2 +.

# Execucao

A execucao deste script se da através da execução do arquivo **artisan.php**

    php artisan serve

E pelo **npm**

    npm run dev
