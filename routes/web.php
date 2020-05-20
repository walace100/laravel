<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/nome/{nome}/{sobrenome}", function($nome, $sn){
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

Route::get("/hellonome/{nome}/{sobrenome}", function ($nome, $sn){
	return view("hellonome", ["nome" => "Walace", "sobrenome" => "Paz"]);
});