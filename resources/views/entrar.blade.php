<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>entrar</title>
    </head>
    <body>
        <form action="http://localhost/laravel/public/c/login" method="POST">
            @csrf
            User:<input type="text" name="user"><br>
            senha:<input type="password" name="password"><br>
            <button>Enviar</button>
        </form>
    </body>
</html>