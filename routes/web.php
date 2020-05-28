<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Categoria;

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