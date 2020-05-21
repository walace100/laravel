<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function getNome(){
    	return "Walace";
    }
    public function getIdade(){
    	return 17;
    }
    public function multiplicar($n1, $n2){
    	return $n1 * $n2;
    }
    public function getNomeById($id){
    	$v = ["Walace", "José", "ninguém", "nada"];
    	if($id >= 0 && $id < count($v)){
    		return $v[$id];
    	} else {
    		return "Não encontrado";
    	}
    }
}