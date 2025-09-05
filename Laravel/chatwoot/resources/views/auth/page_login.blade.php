<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatwoot</title>

    <style>

        .container {

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            padding: 250px;
            
            background-color: lightblue;

        }

        form {

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        label {

            font: 500 1.1em Arial;

            margin-right: 10px;

        }

        input {

            font: 500 1.1em Arial;

            margin-top: 10px;
            padding: 15px 30px;

            border: 1px solid black;
            border-radius: 10px;

            text-align: center;

        }

        button {

            background-color: lightcoral;

            margin: 15px;
            padding: 20px 35px;

            font: 600 1.2em Cursive;

            border: none;
            border-radius: 10px;
            
            cursor: pointer;

            transition:
            
                background-color 0.3s ease-in-out,
                scale 0.3s ease-in-out

        }

        button:hover {

            background-color: rgb(255, 71, 71);

            scale: 1.05;

        }

        p, span {

            font: 500 1.1em Arial;

        }

        p#mensagem {

            background-color: lightcoral;

            border-radius: 10px;

            padding: 20px 35px;

        }

        p#mensagem, h1#titulo {

            margin: 0px 0px 20px 50px;

        }

    </style>

</head>

<body>

    <div class="container">

        @if(session("error"))

            <p id="mensagem">{{ session("error") }}</p>

        @endif

        <h1 id="titulo">Login</h1>

        <form action="{{ route("login") }}" method="POST">

            @csrf

            <div>

                <label for="email">Email</label>
                <input type="email" name="email" id="email">

            </div>

            <div>

                <label for="password">Senha</label>
                <input type="password" name="password" id="password">

            </div>

            <div>

                <button type="submit">Entrar</button>

            </div>

        </form>

        <div>

            <p>

                <span>Eu não tenho uma conta...</span>

                <a href="{{ route("page_register") }}">Cadastrar-se</a>

            </p>

        </div>

    </div>

</body>
</html>