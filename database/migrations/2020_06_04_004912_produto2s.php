<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produto2s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto2s', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->float("preco");
            $table->integer("estoque");
            $table->BigInteger("categoria2_id")->unsigned()->nullable();
            $table->foreign("categoria2_id")->references("id")->on("categoria2s");
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
        Schema::dropIfExists('produto2s');
    }
}
