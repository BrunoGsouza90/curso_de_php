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

            padding: 320px;
            
            background-color: lightblue;

        }

        button {

            cursor: pointer;

            border: none;
            border-radius: 10px;

            padding: 15px 30px;

            font: 600 1.1em Cursive;

            background-color: lightcoral;

            transition:

                background-color 0.3s ease-in-out,
                scale 0.3 ease-in-out;

        }

        button:hover {

            background-color: rgb(245, 96, 96);
            scale: 1.05;

        }

    </style>

</head>

<body>
    
    <div class="container">

        <form action="{{ route("logout") }}" method="POST">

            @csrf

            <div>

                <button type="submit">Sair</button>

            </div>

        </form>

        <h1>Seja bem-vindo ao Chatwoot</h1>

        <p>Nessa aplicação estou fazendo meus testes de uso do Chatwoot.</p>

    </div>

    <script> 

        ( function(d,t) {

            var BASE_URL = "{{ env("CHATWOOT_URL") }}"

            var BASE_TOKEN = "{{ env("CHATWOOT_TOKEN") }}"
            
            var g = d.createElement(t), s = d.getElementsByTagName(t)[0]

            g.src = BASE_URL + "/packs/js/sdk.js"

            g.async = true

            s.parentNode.insertBefore(g,s)

            g.onload = function() {

                window.chatwootSDK.run({

                    websiteToken: BASE_TOKEN,
                    baseUrl: BASE_URL,

                })

                window.chatwootSDK.setUser({

                    identifier: "{{ $identifier }}",
                    name: "{{ $user->name }}",
                    email: "{{ $user->email }}",
                    identifier_hash: "{{ $identifierHash }}"

                })

            }

        })(document,"script")

    </script>

</body>

</html>