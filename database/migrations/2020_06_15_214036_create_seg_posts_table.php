<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_posts', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("email");
            $table->string("titulo");
            $table->string("subtitulo");
            $table->string("mensagem");
            $table->string("arquivo");
            $table->integer("likes");
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
        Schema::dropIfExists('seg_posts');
    }
}
