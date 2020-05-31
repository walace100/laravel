<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;

class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
        return view("produtos2");
    }

    public function index()
    {
        $prods = Produtos::all();
        return $prods->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Produtos();
        $prod->nome = $request->input("nome");
        $prod->preco = $request->input("preco");
        $prod->estoque = $request->input("estoque");
        $prod->categoria_id = $request->input("categoria_id");
        $prod->save();
        return json_encode($prod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Produtos::find($id);
        if(isset($prod)){
            return json_encode($prod);
        }
        return response("Produto não encontrado", 404);
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
        $prod = Produtos::find($id);
        if(isset($prod)){
            $prod->nome = $request->input("nome");
            $prod->preco = $request->input("preco");
            $prod->estoque = $request->input("estoque");
            $prod->categoria_id = $request->input("categoria_id");
            $prod->save();
            return json_encode($prod);
        }
        return response("Produto não encontrado", 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produtos::find($id);
        if(isset($prod)){
            $prod->delete();
            return response("OK", 200);
        } else {
            return response("Produto não encontrado", 404);
        }
            
    }
}
