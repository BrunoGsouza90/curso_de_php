<?php

use Laravel\Fortify\Features;

return [

    /*
    |--------------------------------------------------------------------------
    | Guard do Fortify
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual guard de autenticação o Fortify irá usar
    | ao autenticar usuários. Esse valor deve corresponder a um dos guards
    | já configurados no arquivo de configuração "auth".
    |
    */

    'guard' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Broker de Senha do Fortify
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual broker de senha o Fortify deve usar ao
    | um usuário estiver redefinindo sua senha. Esse valor configurado deve
    | corresponder a um dos brokers configurados no arquivo "auth".
    |
    */

    'passwords' => 'users',

    /*
    |--------------------------------------------------------------------------
    | Nome de Usuário / Email
    |--------------------------------------------------------------------------
    |
    | Este valor define qual atributo do modelo deve ser considerado como o
    | campo "nome de usuário" da sua aplicação. Tipicamente, este pode ser o
    | endereço de email dos usuários, mas você pode alterar este valor aqui.
    |
    | Por padrão, o Fortify espera que os pedidos de "esqueci a senha" e
    | redefinição tenham um campo chamado 'email'. Se a aplicação usa outro
    | nome para este campo, você pode defini-lo abaixo conforme necessário.
    |
    */

    'username' => 'email',

    'email' => 'email',

    /*
    |--------------------------------------------------------------------------
    | Nomes de Usuário em Minúsculas
    |--------------------------------------------------------------------------
    |
    | Este valor define se os nomes de usuário devem ser convertidos para
    | minúsculas antes de serem salvos no banco de dados, pois alguns sistemas
    | de banco de dados são sensíveis a maiúsculas/minúsculas. Você pode
    | desabilitar isso se necessário para sua aplicação.
    |
    */

    'lowercase_usernames' => true,

    /*
    |--------------------------------------------------------------------------
    | Caminho da Home
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar o caminho para onde os usuários serão redirecionados
    | durante a autenticação ou redefinição de senha, quando a operação for
    | bem-sucedida e o usuário estiver autenticado. Você pode alterar este valor.
    |
    */

    'home' => '/',

    /*
    |--------------------------------------------------------------------------
    | Prefixo / Subdomínio das Rotas do Fortify
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual prefixo o Fortify irá atribuir a todas as
    | rotas que ele registrar na aplicação. Se necessário, você pode alterar o
    | subdomínio onde todas as rotas do Fortify estarão disponíveis.
    |
    */

    'prefix' => '',

    'domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Middleware das Rotas do Fortify
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual middleware o Fortify atribuirá às rotas
    | que registrar na aplicação. Você pode alterar esses middleware se
    | necessário, mas normalmente o padrão fornecido é o preferido.
    |
    */

    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Limitação de Taxa (Rate Limiting)
    |--------------------------------------------------------------------------
    |
    | Por padrão, o Fortify limitará os logins a cinco requisições por minuto
    | para cada combinação de email e endereço IP. Porém, se desejar especificar
    | um limitador customizado, você pode definir aqui.
    |
    */

    'limiters' => [
        'login' => 'login',
        'two-factor' => 'two-factor',
    ],

    /*
    |--------------------------------------------------------------------------
    | Rotas para Visualização de Views
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar se as rotas que retornam views devem ser
    | desabilitadas, caso você não precise delas ao construir sua aplicação.
    | Isso é especialmente útil se você estiver criando uma SPA customizada.
    |
    */

    'views' => true,

    /*
    |--------------------------------------------------------------------------
    | Recursos (Features)
    |--------------------------------------------------------------------------
    |
    | Alguns recursos do Fortify são opcionais. Você pode desabilitá-los removendo
    | eles deste array. Pode remover apenas alguns ou até todos, se precisar.
    |
    */

    'features' => [

        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),
        // Features::updateProfileInformation(),
        // Features::updatePasswords(),
        Features::twoFactorAuthentication([

            'confirm' => true,
            'confirmPassword' => true,
            // 'window' => 0,
            
        ]),

    ],

];