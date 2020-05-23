@extends("layouts.meuLayout")
@section("minha_secao_produtos")
	<h1>Loop foreach - Arrays Associativos</h1>
	@foreach($produtos as $p)
		<p> {{$p["id"]}}: {{$p["nome"]}} </p>
	@endforeach
	<hr>
	@foreach($produtos as $p)
		<p>
			{{$p["id"]}}: {{$p["nome"]}}
			@if($loop->first)
				(primeiro)
			@endif
			@if($loop->last)
				(ultimo)
			@endif
			<span class="badge badge-secondary"> {{$loop->index}}/ {{$loop->remaining}} </span>
			<span class="badge badge-warning"> {{$loop->iteration}}/ {{$loop->count}} </span>
		</p>
	@endforeach
@endsection