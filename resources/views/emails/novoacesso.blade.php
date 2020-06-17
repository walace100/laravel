<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h4>Seja bem vindo(a), {{ $nome }}</h4>
        <p>Você acabou de acessar o sistema utilizando o seu email: {{ $email }} </p>
        <p>Data/hora de acesso: {{ $data }}</p>
        <div>
            <img width="10%" height="10%" src="{{ $message->embed(public_path().'/img/laravel.png') }}">
        </div>
    </body>
</html>