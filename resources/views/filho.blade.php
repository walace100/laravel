@extends("layouts.app")
@section("titulo", "Minha Pagina - Filho")
@section("barralateral")
	@parent
	<p>Essa parte é do Filho</p>
@endsection
@section("conteudo")
	<p>este é o conteúdo do filho</p>
@endsection