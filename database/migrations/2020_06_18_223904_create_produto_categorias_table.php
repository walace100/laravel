<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_categorias', function (Blueprint $table) {
            $table->BigInteger("ter_categoria_id")->unsigned();
            $table->foreign("ter_categoria_id")->references("id")->on("ter_categorias");
            $table->BigInteger("ter_produto_id")->unsigned();
            $table->foreign("ter_produto_id")->references("id")->on("ter_produtos");
            $table->primary('ter_produto_id', "ter_categoria_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_categorias');
    }
}
