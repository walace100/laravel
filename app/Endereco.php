<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public function cliente(){
        return $this->belongsTo("App\Cliente2", "cliente2_id", "id");
    }
}
