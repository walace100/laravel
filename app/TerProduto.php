<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerProduto extends Model
{
    protected $fillable = ["nome", "preco"];

    public function categorias(){
        return $this->belongsToMany("App\TerCategoria", "produto_categorias");
    }
}
