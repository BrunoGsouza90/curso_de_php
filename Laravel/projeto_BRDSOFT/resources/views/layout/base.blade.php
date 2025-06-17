<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title', 'Projeto Laravel')</title>
</head>
<body>

    <a href="{{ route('index') }}">HOME</a>

    @if(Session::get('impersonate') == 'impersonate')

        <p>{{ Session::get('is_admin') == 'Não' ? "User imperssonation:" : "Admin imperssonation:"}}{{ Session::get('user_name') }}</p>
        <a href="{{ route('impersonates.logout') }}">Voltar como admin</a>

    @endif

    <br><br>

    <a href="{{ route('auth.logout') }}">Sair</a>

    <br><br>

    <a href=@yield('route', route('index'))>Voltar</a>

    <br><br>

    @if(session('success'))

        <p>{{ session('success') }}</p>

    @endif

    @if(session('error'))

        <p>{{ session('error') }}</p>

    @endif  
    
    @yield('content_main')

</body>
</html>