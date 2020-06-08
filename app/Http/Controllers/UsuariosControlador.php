<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class UsuariosControlador extends Controller
{
    public function __constructor(){
        // $this->middleware("primeiro");
    }

    public function index(){
        Log::debug("UsuariosControlador@index");
        return "
            <h3>Lista de Usuários</h3>
            <ul>
                <li>João</li>
                <li>Maria</li>
                <li>Walace</li>
            </ul>
        ";
    }
}
