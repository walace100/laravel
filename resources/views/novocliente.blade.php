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
                        <form action="http://localhost/laravel/public/form/cliente" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do cliente</label>
                                <input type="text" name="nome" id="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid': '' }}" placeholder="Nome do cliente">
                                @if($errors->has("nome"))
                                    <div class="invalid-feedback">
                                        {{ $errors->first("nome") }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="idade">Idade do cliente</label>
                                <input type="text" name="idade" id="idade" class="form-control {{ $errors->has('nome') ? 'is-invalid': '' }}" placeholder="Idade do cliente">
                                @if($errors->has("idade"))
                                    <div class="invalid-feedback">
                                        {{ $errors->first("idade") }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço do cliente</label>
                                <input type="text" name="endereco" id="endereco" class="form-control {{ $errors->has('nome') ? 'is-invalid': '' }}" placeholder="Endereço do cliente">
                                 @if($errors->has("endereco"))
                                    <div class="invalid-feedback">
                                        {{ $errors->first("endereco") }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email do cliente</label>
                                <input type="text" name="email" id="email" class="form-control {{ $errors->has('nome') ? 'is-invalid': '' }}" placeholder="Email do cliente">
                                @if($errors->has("email"))
                                    <div class="invalid-feedback">
                                        {{ $errors->first("email") }}
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>