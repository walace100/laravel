<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Paginação</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="card text-center">
                <div class="card-header">
                    Tabela de clientes
                </div>
                <div class="card-body">
                    <h5 class="card-title" id="cardTitle"></h5>
                    <table class="table table-hover" id="tabelaClientes">
                        <thead>
                            <th scope="col">ID
                            <th scope="col">Nome
                            <th scope="col">Sobrenome
                            <th scope="col">Email
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav id="paginator">
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>

            function carregarClientes(page){
                $.ajax({
                    url: "http://localhost/laravel/public/f/json",
                    method: "GET",
                    data: {
                        page: page
                    },
                    dataType: "JSON"
                }).done(data => {
                    montarTabela(data)
                    montarPaginator(data)
                    document.querySelectorAll("#paginator > ul > li > a").forEach(e => e.addEventListener("click", () => carregarClientes(e.getAttribute("pagina"))))
                    $("#cardTitle").html(`Exibindo ${data.per_page} clientes de ${data.total} (${data.from} a ${data.to})`)
                })
            }

            function montarTabela(data){
                $("#tabelaClientes > tbody > tr").remove()
                data.data.forEach(e => {
                    let line = montarLinha(e)
                    $("#tabelaClientes > tbody").append(line)
                })
            }

            

            function montarLinha(data){
                return `
                    <tr> 
                    <td> ${data.id}
                    <td> ${data.nome}
                    <td> ${data.sobrenome}
                    <td> ${data.email}
                `
            }

            function montarPaginator(data){
                $("#paginator > ul > li").remove()
                const anterior = getItemAnterior(data)
                $("#paginator > ul").append(anterior)
                let inicio
                const limite = 10
                const atual = data.current_page
                const ultima = data.last_page

                if(atual - limite/2 <= 1)
                    inicio = 1
                else if((ultima - atual) < limite)
                    inicio = ultima - limite + 1
                else 
                    inicio = atual - limite/2

                const fim = inicio + limite - 1
                for(let i = inicio; i <= fim; i++){
                    let page = getItem(data, i)
                    $("#paginator > ul").append(page)
                }

                const proximo = getItemProximo(data)
                $("#paginator > ul").append(proximo)
            }    

            function montarLi(data, cond = false, content = "disabled", extra = ""){
                let result
                if(cond)
                    result = `<li class="page-item ${content}">`
                else 
                    result = `<li class="page-item">`
                return result += `<a class="page-link" ${extra} href="javascript:void(0)">${data}</a></li>`
            }

            function getItem(e, i){
                if(i == e.current_page)
                    return montarLi(i, true, "active", `pagina=${i}`)
                else
                    return montarLi(i, false, "", `pagina=${i}`)
            }

            function getItemAnterior(e){
                const i = e.current_page - 1
                if(e.current_page == 1)
                    return montarLi("Anterior", true, "disabled")
                else
                    return montarLi("Anterior", false, "", `pagina=${i}`)
            }

            function getItemProximo(e){
                const i = e.current_page + 1
                if(e.current_page == e.last_page)
                    return montarLi("Próximo", true, "disabled")
                else
                    return montarLi("Próximo", false, "", `pagina=${i}`)
            }

            (() => carregarClientes(1))()
        </script>
    </body>
</html>
