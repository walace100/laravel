<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteControlador2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view("clientes", compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("novocliente");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            "nome" => "required|min:3|max:20|unique:clientes",
            "idade" => "required",
            "endereco" => "required|min:5",
            "email" => "required|email"
        ];

        $mensagens = [
            "required" => "o atributo :attribute não pode estar em branco",
            "nome.required" => "O nome é requerido",
            "nome.min" => "é necessário no mínimo 3 caracteres no nome",
            "email.required" => "digite um endereço de email",
            "email.email" => "digite um email valido"
        ];

        // $request->validate([
        //     "nome" => "required|min:3|max:20|unique:clientes",
        //     "idade" => "required",
        //     "endereco" => "required|min:5",
        //     "email" => "required|email"
        // ]);
        
        $request->validate($regras, $mensagens);
        $cliente = new Cliente();
        $cliente->nome = $request->input("nome");
        $cliente->idade = $request->input("idade");
        $cliente->endereco = $request->input("endereco");
        $cliente->email = $request->input("email");
        $cliente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
