<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Cadastro de Produtos</title>
    </head>
    <body>
        @component("components.navbar", ["current" => $current])
        @endcomponent
        <div class="container-fluid">
            <main role="main">
                @hasSection("body")
                    @yield("body")
                @endif
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>