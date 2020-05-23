<!DOCTYPE html>
<html>
	<head>
		<title>Minha Pagina</title>
		<link rel="stylesheet" type="text/css" href="{{URL::to('css/app.css')}}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	</head>
	<body>
		@if(isset($produtos))
			@if(count($produtos) == 0))
				<h1>Nenhum produtos</h1>
			@elseif(count($produtos) === 1)
				<h1>Um produto</h1>
			@else
				<h1>Temos vários produtos</h1>
			@endif
			@foreach($produtos as $p)
				<p>Nome: {{$p}} </p>
			@endforeach
		@else
			<h2>Variável produtos não foi passada pelo parâmentro</h2>
		@endif
		<!-- @ empty() @ endempty -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{URL::to('js/app.js')}}"></script>
	</body>
</html>