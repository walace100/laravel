<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto2 extends Model
{
    public function categoria(){
        return $this->belongsTo("App\Categoria2", "categoria2_id", "id");
    }
}
