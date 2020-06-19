<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoCategoria extends Model
{
    protected $fillable = ["ter_produto_id", "ter_categoria_id"];
}
