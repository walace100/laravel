<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerProdutoControlador extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        echo "
            <h4>Lista de Produtos</h4>
            <ul>
                <li>Macarrão</li>
                <li>feijão</li>
                <li>Carne bovina</li>
                <li>Arroz</li>
                <li>Leite</li>
            </ul>
        ";
    }
}
