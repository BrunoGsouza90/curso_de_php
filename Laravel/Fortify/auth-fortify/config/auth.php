<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Padrões de Autenticação
    |--------------------------------------------------------------------------
    |
    | Esta opção define o "guard" padrão de autenticação e o "broker" de
    | redefinição de senha para sua aplicação. Você pode alterar esses valores
    | conforme necessário, mas esses são perfeitos para a maioria das aplicações.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guards de Autenticação
    |--------------------------------------------------------------------------
    |
    | Em seguida, você pode definir todos os guards de autenticação para sua
    | aplicação. Claro, uma ótima configuração padrão já foi definida para você,
    | que utiliza armazenamento de sessão junto com o provedor de usuário Eloquent.
    |
    | Todos os guards de autenticação possuem um provedor de usuário, que define
    | como os usuários são recuperados do seu banco de dados ou outro sistema
    | de armazenamento utilizado pela aplicação. Normalmente, é utilizado Eloquent.
    |
    | Suportado: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Provedores de Usuário
    |--------------------------------------------------------------------------
    |
    | Todos os guards de autenticação possuem um provedor de usuário, que define
    | como os usuários são recuperados do seu banco de dados ou outro sistema
    | de armazenamento utilizado pela aplicação. Normalmente, é utilizado Eloquent.
    |
    | Se você tiver múltiplas tabelas de usuários ou modelos, pode configurar
    | múltiplos provedores para representar cada modelo/tabela. Esses provedores
    | podem então ser atribuídos a quaisquer guards adicionais que você tenha definido.
    |
    | Suportado: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Redefinição de Senhas
    |--------------------------------------------------------------------------
    |
    | Estas opções de configuração especificam o comportamento da funcionalidade
    | de redefinição de senha do Laravel, incluindo a tabela utilizada para
    | armazenamento dos tokens e o provedor de usuário invocado para recuperar usuários.
    |
    | O tempo de expiração é o número de minutos que cada token de redefinição
    | será considerado válido. Essa medida de segurança mantém os tokens com
    | vida curta, reduzindo o tempo para que possam ser descobertos. Você pode
    | alterar este valor conforme necessário.
    |
    | A configuração de throttle é o número de segundos que o usuário deve esperar
    | antes de gerar novos tokens de redefinição de senha. Isso evita que o usuário
    | crie rapidamente uma grande quantidade de tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tempo de Expiração da Confirmação da Senha
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir o número de segundos antes que a janela de
    | confirmação de senha expire e os usuários sejam solicitados a digitar
    | a senha novamente na tela de confirmação. Por padrão, o tempo é de três horas.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
