@extends("layouts.app2", ["current" => "categorias"])
@section("body")
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Categorias</h5>
            @if(count($cats) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr> 
                        <th> Código
                        <th> Nome da Categorias
                        <th> Ações 
                    </thead>
                    <tbody>
                        @foreach($cats as $cat)
                            <tr>
                            <td> {{ $cat->id }}
                            <td> {{ $cat->nome }}
                            <td> <a href="http://localhost/laravel/public/ex1/categorias/editar/{{ $cat->id }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="http://localhost/laravel/public/ex1/categorias/apagar/{{ $cat->id }}" class="btn btn-sm btn-danger">Apagar</a>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="http://localhost/laravel/public/ex1/categorias/novo" class="btn btn-sm btn-primary" role="button">Novo categoria</a>
        </div>
    </div>
@endsection