<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Paginação</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="card text-center">
                <div class="card-header">
                    Tabela de clientes
                </div>
                <div class="card-body">
                    <h5 class="card-title">Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} ({{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})</h5>
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">ID
                            <th scope="col">Nome
                            <th scope="col">Sobrenome
                            <th scope="col">Email
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                <td> {{ $cliente->id }}
                                <td> {{ $cliente->nome }}
                                <td> {{ $cliente->sobrenome }}
                                <td> {{ $cliente->email }}
                           @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
