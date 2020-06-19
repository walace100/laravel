<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TerProduto;

class QuaProdutoControlador extends Controller
{
    public function index(){
        $produtos = TerProduto::with("categorias")->get();
        return view("produtos3", compact("produtos"));
    }
}
