<?php

return [

    /*
     * Ativar / desativar o Google2FA.
     *
     * Define se a autenticação de dois fatores (2FA) estará habilitada no sistema.
     */
    'enabled' => env('OTP_ENABLED', true),

    /*
     * Tempo de vida em minutos.
     *
     * Define por quanto tempo a autenticação 2FA permanece válida após o usuário se autenticar.
     * Útil para exigir que os usuários insiram um novo código OTP periodicamente.
     * Valor 0 significa que o 2FA nunca expira (sessão eterna).
     */
    'lifetime' => env('OTP_LIFETIME', 0), // 0 = eterno

    /*
     * Renovar o tempo de vida a cada nova requisição.
     *
     * Se ativado, o tempo de vida do 2FA será reiniciado a cada nova requisição do usuário.
     * Isso é útil para manter sessões ativas enquanto o usuário estiver navegando ativamente.
     */
    'keep_alive' => env('OTP_KEEP_ALIVE', true),

    /*
     * Container de autenticação.
     *
     * Define qual serviço de autenticação Laravel será utilizado.
     * Normalmente, o valor padrão é 'auth', que usa o sistema padrão do Laravel.
     */
    'auth' => 'auth',

    /*
     * Guard de autenticação.
     *
     * Permite especificar um guard personalizado para autenticação.
     * Útil quando se trabalha com múltiplos tipos de usuários (ex: admins, clientes, etc.).
     * Deixe em branco para usar o guard padrão.
     */
    'guard' => '',

    /*
     * Variável de sessão que indica se o 2FA foi verificado.
     *
     * Após o usuário passar pela verificação 2FA com sucesso, essa variável será armazenada na sessão.
     */
    'session_var' => 'google2fa',

    /*
     * Nome do campo de entrada do formulário para o código OTP.
     *
     * Define o nome do campo `input` que será usado no formulário HTML onde o usuário digita o código 2FA.
     */
    'otp_input' => 'one_time_password',

    /*
     * Janela de tempo para o código OTP.
     *
     * Define quantas "janelas" de tempo (30 segundos por padrão) serão aceitas para validar um código.
     * Por exemplo, valor 1 permite aceitar códigos gerados até 30 segundos antes ou depois do tempo atual.
     * Isso ajuda a evitar erros causados por pequenas diferenças no horário entre o servidor e o dispositivo do usuário.
     */
    'window' => 1,

    /*
     * Proibir o reuso de códigos OTP antigos.
     *
     * Quando ativado, impede que o mesmo código 2FA seja usado mais de uma vez.
     * Aumenta a segurança, mas pode causar problemas se a hora do usuário estiver fora de sincronia.
     */
    'forbid_old_passwords' => false,

    /*
     * Nome da coluna na tabela de usuários que armazena o segredo do Google2FA.
     *
     * Essa coluna armazena a chave secreta única para cada usuário, usada para gerar os códigos 2FA.
     */
    'otp_secret_column' => 'google2fa_secret',

    /*
     * Nome da view usada para solicitar o código OTP.
     *
     * Essa view será exibida quando o usuário precisar inserir o código 2FA.
     */
    'view' => 'auth.2fa_verify',

    /*
     * Mensagens de erro relacionadas ao código OTP.
     *
     * Define as mensagens que serão exibidas quando ocorrerem erros na verificação do código 2FA.
     */
    'error_messages' => [
        'wrong_otp'       => "O 'Código de Verificação' digitado está incorreto.",
        'cannot_be_empty' => 'O código de verificação não pode estar vazio.',
        'unknown'         => 'Ocorreu um erro desconhecido. Por favor, tente novamente.',
    ],

    /*
     * Lançar exceções ou apenas disparar eventos?
     *
     * Quando ativado, lançará exceções PHP em caso de erro.
     * Quando desativado, apenas disparará eventos que podem ser tratados manualmente.
     */
    'throw_exceptions' => env('OTP_THROW_EXCEPTION', true),

    /*
     * Qual backend de imagem usar para gerar os QR Codes?
     *
     * Define a tecnologia usada para gerar os QR Codes que os usuários escanearão com o app autenticador.
     * Opções disponíveis: imagemagick, svg e eps.
     * SVG é uma boa escolha por ser leve e suportado pela maioria dos navegadores modernos.
     */
    'qrcode_image_backend' => \PragmaRX\Google2FALaravel\Support\Constants::QRCODE_IMAGE_BACKEND_SVG,

];
