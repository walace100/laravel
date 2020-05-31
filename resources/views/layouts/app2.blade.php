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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        @hasSection("js")
            @yield("js")
        @endif
    </body>
</html>