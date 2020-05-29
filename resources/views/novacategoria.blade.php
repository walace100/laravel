@extends("layouts.app2", ["current" => "categorias"])
@section("body")
    <div class="card border">
        <div class="card-body">
            <form action="http://localhost/laravel/public/ex1/categorias" method="POST">
                @CSRF
                <div class="form-group">
                    <label for="nomeCategoria">Noma da Categoria</label>
                    <input type="text" name="nomeCategoria" id="nomeCategoria" class="form-control" placeholder="Categoria">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="cancel" class="btn btn-danger">Cancelar</button>
            </form>
        </div>
    </div>
@endsection