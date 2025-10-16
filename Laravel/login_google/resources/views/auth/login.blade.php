<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    
    <h1>Login</h1>

    @if(session("error"))

        <p>{{ session("error") }}</p>

    @endsession

    <form method="POST" action={{route("auth")}}>

        @csrf

        <div>

            <label for="email">Email: </label>
            <input type="email" name="email" id="email">

        </div>

        <br>

        <div>

            <label for="password">Password: </label>
            <input type="password" name="password" id="password">

        </div>

        <br>

        <div>

            <button type="submit">Enter</button>

        </div>

    </form>

    <br>

    <a href="">Enter with Google</a>

</body>
</html>