<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    private $clientes = [
        ["id" => 1, "nome" => "ademir"],
        ["id" => 2, "nome" => "joão"],
        ["id" => 3, "nome" => "maria"],
        ["id" => 4, "nome" => "aline"]
    ];

    public function __construct(){
        $clientes = session("clientes");
        if(isset($clientes))
            session(["clientes" => $this->clientes]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = session("clientes");
        return view("clientes.index", compact(["clientes"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session("clientes");
        $id = count($clientes) + 1;
        $nome = $request->nome;
        $dados = ["id" => $id, "nome" => $nome];
        $clientes[] = $dados;
        session(["session" => $clientes]);
        return redirect()->route("clientes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $v = ["Walace", "José", "ninguém", "nada"];
        if($id >= 0 && $id < count($v)){
            return $v[$id];
        } else {
            return "Não encontrado";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "formulário para editar Cliente com ID $id";
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
        $s = "Atualizar cliente com id $id: ";
        $s .= "Nome: ". $request->input("nome")." e ";
        $s .= "Idade: ". $request->input("idade"). " ";
        return response($s, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response("apagado cliente com id: $id", 200);
    }

    public function requisitar(Request $request){
        echo "nome: ". $request->input("nome");
    }
}
