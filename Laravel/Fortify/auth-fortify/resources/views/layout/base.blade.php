<!DOCTYPE html>
<html lang="pt-br" data-theme="light" class="bg-gray-3w00">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <title>@yield("titulo", "Fortify")</title>

</head>

<body>

    @yield("conteudo_principal")

    @vite('resources/js/app.js')

</body>
</html>