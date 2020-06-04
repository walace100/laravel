<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Categoria;
use App\Cliente2;
use App\Endereco;
use App\Categoria2;
use App\Produto2;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/ola1", function(){
	return "Olá";
});

Route::get("/ola2/sejabemvindo", function(){
	return "<h1>Olá, seja bem vindo</h1>";
});

Route::get("/nome1/{nome}/{sobrenome}", function($nome, $sn){
	return "<h1>Olá, $nome $sn!</h1>";
});

Route::get("/repetirnome/{nome}/{n}", function($nome, $n){
	for($i = 0; $i < $n; $i++){
		echo "<h1>Olá, $nome!</h1>";
	}
});

Route::get("/seunomecomregra/{nome}/{n}", function($nome, $n){
	for($i = 0; $i < $n; $i++){
		echo "<h1>Olá, $nome! ($i)</h1>";
	} 
})->where("n", "[0-9]+")->where("nome", "[A-Za-z]+");

Route::get("/seunomesemregra/{nome?}", function($nome = null){
	if(isset($nome)){
		echo "<h1>Olá, $nome!</h1>";
	} else {
		echo "Você não passou nenhum nome";
	}
}); 

Route::prefix("app")->group(function(){

	Route::get("/", function(){
		return "Página principal";
	});
	Route::get("/profile", function(){
		return "Página profile";
	});
	Route::get("/about", function(){
		return "Página about";
	});

});

Route::redirect("/aqui", "ola", 301);

Route::view("/hello","hello");

Route::view("/hellonome","hellonome", ["nome" => "Walace", "sobrenome" => "Paz"]);

Route::get("/hellonome/{nome}/{sobrenome}", function($nome, $sn){
	return view("hellonome", ["nome" => $nome, "sobrenome" => $sn]);
});

Route::get("/rest/hello", function(){
	return "Hello, {GET}";
});

Route::post("/rest/hello", function(){
	return "Hello, {POST}";
});

Route::delete("/rest/hello", function(){
	return "Hello, {DELETE}";
});

Route::put("/rest/hello", function(){
	return "Hello, {PUT}";
});

Route::patch("/rest/hello", function(){
	return "Hello, {PATCH}";
});

Route::options("/rest/hello", function(){
	return "Hello, {OPTIONS}";
});

Route::post("/rest/imprimir", function(Request $req){ //não vai funcionar
	$nome = $req->input("nome");
	$idade = $req->input("idade");
	return "Hello, $nome! {POST}";
});

Route::match(["get", "post"], "/rest/hello2", function(){
	return "Hello World 2";
});

Route::any("/rest/hello3", function(){
	return "Hello World 3";
});

Route::get("/produtos1", function(){
	echo "<h1>Produtos</h1>";
	echo "<ul>";
	echo "<li>Notebook</li>";
	echo "<li>Impressora</li>";
	echo "<li>Mouse</li>";
	echo "</ul>";
})->name("meusprodutos");

Route::get("/linkprodutos", function(){
	$url = route("meusprodutos");
	echo "<a href=". $url .">meus produtos</a>";
});

Route::get("/redirecionarprodutos", function(){
	return redirect()->route("meusprodutos");
});
/**
* Aula de Controladores
*
*/
Route::get("/nome", "MeuControlador@getNome");

Route::get("/idade", "MeuControlador@getIdade");

Route::get("/multiplicar/{n1}/{n2}", "MeuControlador@multiplicar");

Route::get("/nomes/{id}", "MeuControlador@getNomeById");

Route::resource("/cliente", "ClienteControlador");

Route::post("/cliente/requisitar", "ClienteControlador@requisitar");
/**
* Aula de Views
*
*/
Route::get("/primeiraview", function(){
	return view("Minhaview");
});

Route::get("/ola", function(){
	//return view("Minhaview")->with("nome", "Walace")->with("sobrenome", "Paz");
});

Route::get("/ola/{nome}/{sobrenome}", function($nome, $sobrenome){
	//return view("Minhaview")->with("nome", $nome)->with("sobrenome", $sobrenome);
	// $parametros = ["nome" => $nome, "sobrenome" => $sobrenome];
	return view("Minhaview", compact("nome", "sobrenome"));
});

Route::get("/email/{email}", function($email){
	if(View::exists("email"))
		return view("email", compact("email"));
	else
		return view("erro");
});

Route::get("/filho", function(){
	return view("filho");
});

Route::get("/pagina", function(){
	return view("pagina");
});
/**
* Aula de Views dia 2
*
*/
Route::get("/produtos", "ProdutoControlador@listar");

Route::get("/secaoprodutos/{palavra}", "ProdutoControlador@secaoprodutos");

Route::get("/mostraropcoes", "ProdutoControlador@mostraropcoes");

Route::get("/opcoes/{opcoes}", "ProdutoControlador@opcoes");

route::get("/loop/for/{n}", "ProdutoControlador@loopfor");

Route::get("loop/foreach", "ProdutoControlador@loopforeach");
/**
* Aula de banco
*
*/
Route::get("/categorias", function(){
	$cats = DB::table("categorias")->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	$nomes = DB::table("categorias")->pluck("nome");
	foreach($nomes as $nome){
		echo "$nome<br>";
	}

	echo "<hr>";
	$cats = DB::table("categorias")->where("id", 1)->get();
	echo "id: ".$cats[0]->id."; ";
	echo "nome: ".$cats[0]->nome." <br>";

	echo "<hr>";
	$cats = DB::table("categorias")->where("id", 1)->get()->first();
	echo "id: $cats->id; ";
	echo "nome: $cats->nome <br>";
	
	echo "<hr>";
	echo "<p>Retorna um array utilizando like</p>"; 
	$cats = DB::table("categorias")->where("nome", "like", "p%")->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	echo "<p>sentenças logicas</p>"; 
	$cats = DB::table("categorias")->where("id", 1)->orWhere("id", 2)->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	echo "<p>intervalos</p>"; 
	$cats = DB::table("categorias")->whereBetween("id", [1, 2])->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	echo "<p>intervalos negação</p>"; 
	$cats = DB::table("categorias")->whereNotBetween("id", [1, 2])->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	echo "<p>conjuntos</p>"; 
	$cats = DB::table("categorias")->whereIn("id", [1, 3, 4])->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	echo "<p>conjuntos negação</p>"; 
	$cats = DB::table("categorias")->whereNotIn("id", [1, 3, 4])->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	echo "<p>sentenças logicas</p>"; 
	$cats = DB::table("categorias")->where([
		["id", 1],
		["nome", "roupas"]
	])->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	echo "<p>ordernando por nome</p>"; 
	$cats = DB::table("categorias")->orderBy("nome")->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}

	echo "<hr>";
	echo "<p>ordernando por nome (decrescente)</p>"; 
	$cats = DB::table("categorias")->orderBy("nome", "desc")->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}
});

Route::get("/novascategorias", function(){
	DB::table("categorias")->insertGetId(
		["nome" => "Carros"]
	);
});

Route::get("/atualizandocategorias", function(){

	echo "<p>Antes da atualização</p>";
	$cats = DB::table("categorias")->where("id", 1)->first();
	echo "id: $cats->id; ";
	echo "nome: $cats->nome <br>";
	$cats = DB::table("categorias")->where("id", 1)->update([
		"nome" => "Roupas infantis"
	]);
	$cats = DB::table("categorias")->where("id", 1)->first();
	echo "<p>Depois da atualização</p>";
	echo "id: $cats->id; ";
	echo "nome: $cats->nome <br>";
});

Route::get("/removendocategorias", function(){

	echo "<p>ANTES da remoção</p>";
	$cats = DB::table("categorias")->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}
	echo "<hr>";
	DB::table("categorias")->where("id", 6)->delete();

	echo "<p>DEPOIS da remoção</p>";
	$cats = DB::table("categorias")->get();
	foreach($cats as $cat){
		echo "id: $cat->id; ";
		echo "nome: $cat->nome <br>";
	}
});
/**
* Aula de model
*
*/
Route::get("/insert/{nome}", function($nome){
	$cat = new Categoria();
	$cat->nome = $nome;
	$cat->save();
	return redirect("/select");
});

Route::get("/select", function(){
	$categorias = Categoria::all();
	foreach($categorias as $c){
		echo "id: $c->id , nome: $c->nome <br>";
	}
});

Route::get("/categoria/{id}", function($id){
	$cat = Categoria::findOrFail($id); # ::find
	echo "id: $cat->id , nome: $cat->nome <br>";
	
});

Route::get("/atualizar/{id}/{nome}", function($id, $nome){
	$cat = Categoria::find($id);
	if(isset($cat)){
		$cat->nome = $nome;
		$cat->save();
		return redirect("/select");
	} else {
		echo "<h1>Categoria não encontrado</h1>";
	}
});

Route::get("/remover/{id}", function($id){
	$cat = Categoria::find($id);
	if(isset($cat)){
		$cat->delete();
		return redirect("/select");
	} else {
		echo "<h1>Categoria não encontrado</h1>";
	}
});

Route::get("/categoriapornome/{nome}", function($nome){
	$categorias = Categoria::where("nome", $nome)->get();
	foreach($categorias as $c){
		echo "id: $c->id , nome: $c->nome <br>";
	}
});

Route::get("/categoriaidmaiorque/{id}", function($id){
	$categorias = Categoria::where("id", ">=", $id)->get();
	foreach($categorias as $c){
		echo "id: $c->id , nome: $c->nome <br>";
	}
	$count = Categoria::where("id", ">=", $id)->count();
	echo "<h1>Count: $count</h1>";
	$max = Categoria::where("id", ">=", $id)->max("id");
	echo "<h1>Count: $max</h1>";
});

Route::get("/ids123", function(){
	$categorias = Categoria::find([1, 2, 3]);
	foreach($categorias as $c){
		echo "id: $c->id , nome: $c->nome <br>";
	}
});

Route::get("/todas", function(){
	$categorias = Categoria::withTrashed()->get();
	foreach($categorias as $c){
		echo "id: $c->id , nome: $c->nome ";
		if($c->trashed())
			echo "(apagado)<br>";
		else 
			echo "<br>";
	}
});

Route::get("/ver/{id}", function($id){
	#$cat = Categoria::withTrashed()->find($id); 
	$cat = Categoria::where("id", $id)->get()->first();
	if(isset($cat)){
		echo "id: $cat->id , nome: $cat->nome <br>";
	} else {
		echo "<h1>Categoria não encontrado</h1>";
	}
});

Route::get("/apagadas", function(){
	$categorias = Categoria::onlyTrashed()->get();
	foreach($categorias as $c){
		echo "id: $c->id , nome: $c->nome ";
		if($c->trashed())
			echo "(apagado)<br>";
		else 
			echo "<br>";
	}
});

Route::get("/restaurar/{id}", function($id){
	$cat = Categoria::withTrashed()->find($id); 
	if(isset($cat)){
		$cat->restore();
		echo "Categoria restaurada: $cat->id , nome: $cat->nome <br>";
		echo "<a href='../select'>Listar todas </a>";
	} else {
		echo "<h1>Categoria não encontrado</h1>";
	}
});

Route::get("/apagarpermanentemente/{id}", function($id){
	$cat = Categoria::withTrashed()->find($id); 
	if(isset($cat)){
		$cat->forceDelete();
		return redirect("/todas");
	} else {
		echo "<h1>Categoria não encontrado</h1>";
	}
});

/**
* Aula prática
*
*/

Route::get("/ex1", function(){
	return view("index");
});

Route::get("/ex1/produtos", "ControladorProduto@indexView");

Route::get("/ex1/categorias", "ControladorCategoria@index");

Route::post("/ex1/categorias", "ControladorCategoria@store");

Route::get("/ex1/categorias/novo", "ControladorCategoria@create");

Route::get("/ex1/categorias/apagar/{id}", "ControladorCategoria@destroy");

Route::get("/ex1/categorias/editar/{id}", "ControladorCategoria@edit");

Route::post("/ex1/categorias/{id}", "ControladorCategoria@update");

/**
* Aula de validação de formulário
*
*/

Route::get("/form", "ClienteControlador2@index");

Route::get("/form/novocliente", "ClienteControlador2@create");

Route::post("/form/cliente", "ClienteControlador2@store");

/**
* Aula de relacionamento 1 pra 1
*
*/

Route::get("/clientes", function(){
	$clientes = Cliente2::all();
	foreach($clientes as $c){
		echo "<p>ID: $c->id </p>";
		echo "<p>Nome: $c->nome </p>";
		echo "<p>Telefone: $c->telefone </p>";
		#$e = Endereco::where("cliente_id", $c->id)->first();
		echo "<p>rua: ".$c->endereco->rua." </p>";
		echo "<p>numero:". $c->endereco->numero." </p>";
		echo "<p>bairro:". $c->endereco->bairro." </p>";
		echo "<p>cidade:". $c->endereco->cidade." </p>";
		echo "<p>uf:". $c->endereco->uf." </p>";
		echo "<p>cep:". $c->endereco->cep." </p>";
		echo "<hr>";
	}
});

Route::get("/enderecos", function(){
	$end = Endereco::all();
	foreach($end as $e){
		echo "<p>ID: $e->cliente2_id </p>";
		echo "<p>Nome:". $e->cliente->nome." </p>";
		echo "<p>Telefone:". $e->cliente->telefone."</p>";
		echo "<p>rua: $e->rua </p>";
		echo "<p>numero: $e->numero </p>";
		echo "<p>bairro: $e->bairro </p>";
		echo "<p>cidade: $e->cidade </p>";
		echo "<p>uf: $e->uf </p>";
		echo "<p>cep: $e->cep </p>";
		echo "<hr>";
	}
});

Route::get("/inserir", function(){
	$c = new Cliente2();
	$c->nome = "Walace Paz";
	$c->telefone = "21 973039039";
	$c->save();
	$e = new Endereco();
	$e->rua = "Rua Senhora";
	$e->numero = 401;
	$e->bairro = "Campo Grande";
	$e->cidade = "Rio de Janeiro";
	$e->uf = "RJ";
	$e->cep = "23085-550";
	#$e->cliente2_id = $c->id;
	$c->endereco()->save($e);

	$c = new Cliente2();
	$c->nome = "Walace Paz2";
	$c->telefone = "21 973039039";
	$c->save();
	$e = new Endereco();
	$e->rua = "Rua Florianopolis";
	$e->numero = 401;
	$e->bairro = "Praça Seca";
	$e->cidade = "Rio de Janeiro";
	$e->uf = "RJ";
	$e->cep = "23085-550";
	$c->endereco()->save($e);
});

Route::get("/clientes/json", function(){
	#$clientes = Cliente2::all();
	$clientes = Cliente2::with(["endereco"])->get();
	return $clientes->toJson();
});

Route::get("/enderecos/json", function(){
	#$enderecos = Endereco::all();
	$enderecos = Endereco::with(["cliente"])->get();
	return $enderecos->toJson();
});

/**
* Aula de relacionamento 1 pra muitos
*
*/

Route::get("a/categorias", function(){
	$cat = Categoria2::all();
	if(count($cat) === 0){
		echo "<h4>Você não possui nenhuma categoria cadastrada </h4>";
	} else {
		foreach($cat as $c){
			echo "<p>$c->id - $c->nome</p>";
		}
	}
});

Route::get("a/produtos", function(){
	$prod = Produto2::all();
	if(count($prod) === 0){
		echo "<h4>Você não possui nenhum produto cadastrado </h4>";
	} else {
		echo "<table border='1'>";
		echo "<thead>";
		echo "<tr> <td> Nome";
		echo "<td> Estoque";
		echo "<td> preco";
		echo "<td> categoria";
		echo "</thead>";
		echo "<tbody>";
		foreach($prod as $p){
			echo "<tr>";
			echo "<td>$p->nome</td>";
			echo "<td>$p->estoque</td>";
			echo "<td>$p->preco</td>";
			echo "<td>". $p->categoria->nome ."</td>";
		}
		echo "</tbody>";
		echo "</table>";
	}
});

Route::get("a/categoriasprodutos", function(){
	$cat = Categoria2::all();
	if(count($cat) === 0){
		echo "<h4>Você não possui nenhuma categoria cadastrada </h4>";
	} else {
		foreach($cat as $c){
			echo "<p>$c->id - $c->nome</p>";
			$produtos = $c->produtos;
			if(count($produtos) > 0){
				echo "<ul>";
				foreach($produtos as $p){
					echo "<li> $p->nome </li>";
				}
				echo "</ul>";
			}
		}
	}
});

Route::get("a/categoriasprodutos/json", function(){
	$cats = Categoria2::with("produtos")->get();
	return $cats->toJson();
});

Route::get("a/adicionarproduto", function(){
	$cat = Categoria2::find(1);
	$p = new Produto2();
	$p->nome = "Meu novo produto";
	$p->estoque = 10;
	$p->preco = 100;
	$p->categoria()->associate($cat);
	$p->save();
	return $p->toJson();
});

Route::get("a/removerprodutocategoria", function(){
	$p = Produto2::find(10);
	if(isset($p)){
		$p->categoria()->dissociate();
		$p->save();
		return $p->toJson();
	}
	return "";
});

Route::get("a/adicionarproduto/{catid}", function($catid){
	$cat = Categoria2::with("produtos")->find($catid);
	$p = new Produto2();
	$p->nome = "Meu novo produto adicionado";
	$p->estoque = 10;
	$p->preco = 500;
	if(isset($cat)){
		$cat->produtos()->save($p);
	}
	$cat->load("produtos");
	return $cat->toJson();
});