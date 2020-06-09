<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoControlador extends Controller
{
    public function index(){
        echo "
            <h4>Lista de Categorias</h4>
            <ul>
                <li>Alimentos</li>
                <li>Eletronicos</li>
                <li>Moveis</li>
                <li>Informatica</li>
            </ul>
        ";
        if(Auth::check()){
            $user = Auth::user();
            echo "<h4>Você está logado</h4>";
            echo "<p>$user->name</p>";
            echo "<p>$user->email</p>";
            echo "<p>$user->id</p>";
        } else {
            echo "<h4>Você não está logado</h4>";
        }
    }
}
