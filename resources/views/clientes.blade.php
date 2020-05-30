<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Cadastro de Clientes</title>
    </head>
    <body>
        <main role="main">
            <div class="container-fluid col-sm-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de Cliente
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="tableprodutos">
                            <thead>
                                <tr>
                                <th> Código
                                <th> Nome 
                                <th> Idade 
                                <th> Endereço
                                <th> Email
                            </thead>
                            <tbody>
                                @foreach($clientes as $c)
                                    <tr> 
                                    <td> {{ $c->id }}
                                    <td> {{ $c->nome }}
                                    <td> {{ $c->endereco }}
                                    <td> {{ $c->idade }}
                                    <td> {{ $c->email }}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>