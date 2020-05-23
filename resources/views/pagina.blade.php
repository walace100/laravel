<!DOCTYPE html>
<html>
	<head>
		<title>Minha Pagina</title>
		<!-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> -->
		<link rel="stylesheet" type="text/css" href="{{URL::to('css/app.css')}}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	</head>
	<body>
		@component("components.meucomponente", ["tipo" => "danger", "titulo" => "erro fatal"])
			<strong>Erro: </strong> sua mensagem de 
		@endcomponent
		@component("components.meucomponente", ["tipo" => "warning", "titulo" => "erro fatal"])
			<strong>Erro: </strong> sua mensagem de 
		@endcomponent
		@component("components.meucomponente", ["tipo" => "success", "titulo" => "erro fatal"])
			<strong>Erro: </strong> sua mensagem de 
		@endcomponent
		@component("components.meucomponente", ["tipo" => "primary", "titulo" => "erro fatal"])
			<strong>Erro: </strong> sua mensagem de 
		@endcomponent
		@component("components.meucomponente", ["tipo" => "secundary", "titulo" => "erro fatal"])
			<strong>Erro: </strong> sua mensagem de 
		@endcomponent
		@component("components.meucomponente", ["tipo" => "info", "titulo" => "erro fatal"])
			<strong>Erro: </strong> sua mensagem de 
		@endcomponent
		@component("components.meucomponente", ["tipo" => "dark", "titulo" => "erro fatal"])
			<strong>Erro: </strong> sua mensagem de 
		@endcomponent
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{URL::to('js/app.js')}}"></script>
		<!-- <script type="text/javascript" src="{{asset('js/app.js')}}"></script> -->
	</body>
</html>