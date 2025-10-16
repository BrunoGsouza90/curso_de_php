<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>

    <form action="{{route("logout")}}" method="POST">

        @csrf

        <button type="submit">Logout</button>

    </form>
    
    <h1>Home</h1>

    <p>Welcome the page main this project!</p>

    <p>Here we will start a study of login using google in Laravel.</p>

</body>
</html>