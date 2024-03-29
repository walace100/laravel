<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigInteger("cliente2_id")->unsigned();
            $table->foreign("cliente2_id")->references("id")->on("cliente2s");
            $table->primary("cliente2_id");
            $table->string("rua");
            $table->integer("numero");
            $table->string("bairro");
            $table->string("cidade");
            $table->string("uf");
            $table->string("cep");
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
        Schema::dropIfExists('enderecos');
    }
}
