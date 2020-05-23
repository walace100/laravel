<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    public function Listar(){
    	$produtos = [
    		"Notebook Asus i7 16GB",
    		"Mouse e Teclado Microsoft USB",
    		"Monitor 21 - Samsung",
    		"Impressora HP",
    		"Disco SSD 512GB"
    	];
    	return view("produtos", compact("produtos"));
    }
    public function secaoprodutos($palavra){
    	return view("secao_produtos", compact("palavra"));
    }
    public function mostraropcoes(){
        return view("mostrar_opcoes");
    }
    public function opcoes($opcao){
        return view("opcoes", compact("opcao"));
    }
    public function loopfor($n){
        return view("loop_for", compact("n"));
    }
    public function loopforeach(){
        $produtos = [
            ["id" => 1, "nome" => "computador"],
            ["id" => 2, "nome" => "mouse"],
           [ "id" => 3, "nome" => "impressora"],
            ["id" => 4, "nome" => "monitor"],
            ["id" => 5, "nome" => "teclado"]
        ];
        return view("foreach", compact("produtos"));
    }
}
