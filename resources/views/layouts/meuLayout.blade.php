<!DOCTYPE html>
<html>
	<head>
		<title>Minha Pagina</title>
		<link rel="stylesheet" type="text/css" href="{{URL::to('css/app.css')}}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	</head>
	<body>
		@hasSection("minha_secao_produtos")
			<div class="card">
				<div class="card-body">
					<h5 class="card-title" style="width: 500px; margin: 10px;">Produtos</h5>
					<p class="card-text">@yield("minha_secao_produtos")	</p>
					<a href="#" class="card-link">Informações</a>
					<a href="#" class="card-link">Ajuda</a>
				</div>
			</div>
		@endif
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{URL::to('js/app.js')}}"></script>
	</body>
</html>