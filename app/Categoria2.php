<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria2 extends Model
{
    public function produtos()
    {
        return $this->hasMany("App\Produto2");
    }
}
