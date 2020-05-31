@extends("layouts.app2", ["current" => "produtos"])
@section("body")
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <table class="table table-ordered table-hover" id="tabelaProdutos">
                <thead>
                    <tr> 
                    <th> Código
                    <th> Nome 
                    <th> Quantidade
                    <th> Preço
                    <th> Departamento
                    <th> Ações 
                </thead>
                <tbody>
                       
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo Produtos</button>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="nome do Produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precoProduto" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="precoProduto" placeholder="preço do Produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantidadeProduto" class="control-label">Quantidade do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="quantidadeProduto" placeholder="Quantidade do Produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoriaProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <select type="text" class="form-control" id="categoriaProduto">
                
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("js")
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        })
        function novoProduto(){
            $("#id").val("")
            $("#nomeProduto").val("")
            $("#precoProduto").val("")
            $("#quantidadeProduto").val("")
            $("#categoriaProduto").val("")
            $("#dlgProdutos").modal("show")
        }
        function carregarCategorias(){
            $.ajax({
                method: "GET",
                url: "http://localhost/laravel/public/api/ex1/categorias",
                dataType: "json"
            }).done(data => {
                data.forEach(e => {
                    const option = `<option value=${e.id}>${e.nome}</option>`
                    $("#categoriaProduto").append(option)
                })
            })
        }
        function carregarProdutos(){
            $.ajax({
                method: "GET",
                url: "http://localhost/laravel/public/api/ex1/produtos",
                dataType: "json"
            }).done(data => {
                data.forEach(e => {
                    const line = montarLinha(e)
                    $("#tabelaProdutos > tbody").append(line)
                })
            })
        }
        function montarLinha(produto){
            const line = `
                <tr>
                <td> ${produto.id}
                <td> ${produto.nome}
                <td> ${produto.estoque}
                <td> ${produto.preco}
                <td> ${produto.categoria_id}
                <td> <button class="btn btn-sm btn-primary" onclick="editar(${produto.id})">Editar</button>
                <button class="btn btn-sm btn-danger" onclick="remover(${produto.id})">Apagar</button>
            `
            return line
        }
        function criarProduto(){
            const produto = {
                nome: $("#nomeProduto").val(),
                preco: $("#precoProduto").val(),
                estoque: $("#quantidadeProduto").val(),
                categoria_id: $("#categoriaProduto").val()
            }
            $.ajax({
                method: "POST",
                url: "http://localhost/laravel/public/api/ex1/produtos",
                dataType: "json",
                data: produto
            }).done(data => {
                const line = montarLinha(data)
                $("#tabelaProdutos > tbody").append(line)
            })
        }
        function remover(id){
            $.ajax({
                method: "DELETE",
                url: `http://localhost/laravel/public/api/ex1/produtos/${id}`
            }).done(() => {
                const lines = $("#tabelaProdutos > tbody > tr")
                const itemRemovido = lines.filter((i, e) => {
                    return e.cells[0].textContent == id
                })
                if(itemRemovido)
                    itemRemovido.remove()
            }).fail(error => console.log)
        }
        function editar(id){
            $.ajax({
                method: "GET",
                url: `http://localhost/laravel/public/api/ex1/produtos/${id}`,
                dataType: "json"
            }).done(data => {
                $("#id").val(data.id)
                $("#nomeProduto").val(data.nome)
                $("#precoProduto").val(data.preco)
                $("#quantidadeProduto").val(data.estoque)
                $("#categoriaProduto").val(data.categoria_id)
                $("#dlgProdutos").modal("show")
            }).fail(error => console.log)
        }
        function salvarProduto(){
            const produto = {
                id: $("#id").val(),
                nome: $("#nomeProduto").val(), 
                preco: $("#precoProduto").val(),
                estoque: $("#quantidadeProduto").val(),
                categoria_id: $("#categoriaProduto").val()
            }
            $.ajax({
                method: "PUT",
                url: `http://localhost/laravel/public/api/ex1/produtos/${produto.id}`,
                dataType: "json",
                data: produto
            }).done(data => {
                const lines = $("#tabelaProdutos > tbody > tr")
                let itemEditado = lines.filter((i, e) => {
                    return e.cells[0].textContent == data.id
                })
                console.log(itemEditado)
                if(itemEditado){
                    itemEditado[0].cells[0].textContent = data.id
                    itemEditado[0].cells[1].textContent = data.nome
                    itemEditado[0].cells[2].textContent = data.estoque
                    itemEditado[0].cells[3].textContent = data.preco
                    itemEditado[0].cells[4].textContent = data.categoria_id
                }
            }).fail(error => console.log)
        }
        $("#formProduto").submit(event => {
            event.preventDefault()
            if($("#id").val() != "")
                salvarProduto()
            else 
                criarProduto()
            $("#dlgProdutos").modal("hide")
        }); // ponto e vigula de ouro
        (() => {
            carregarCategorias()
            carregarProdutos()
        })()
    </script>
@endsection