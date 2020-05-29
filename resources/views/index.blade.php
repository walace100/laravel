@extends("layouts.app2", ["current" => "home"])
@section("body")
    <div class="jumbotron bg-light border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de produtos</h5>
                        <p class="card-text">
                            Aqui você cadastra todos os seus produtos.
                            Só não se esqueça de cadastrar previamente as categorias
                        </p>
                        <a href="http://localhost/laravel/public/ex1/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de categorias</h5>
                        <p class="card-text">
                            Cadastre as categorias dos seus produtos
                        </p>
                        <a href="http://localhost/laravel/public/ex1/produtos" class="btn btn-primary">Cadastre suas categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection