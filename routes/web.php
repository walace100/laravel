<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

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

Route::get("/ola", function(){
	return "Olá";
});

Route::get("/ola/sejabemvindo", function(){
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
	return view("hellonome", ["nome" => "Walace", "sobrenome" => "Paz"]);
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

Route::get("/produtos", function(){
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