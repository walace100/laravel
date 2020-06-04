<?php

use Illuminate\Database\Seeder;

class Produto2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("produto2s")->insert(["nome" => "Camiseta Polo", "preco" => 100, "estoque" => 4, "categoria2_id" => 1]);
        DB::table("produto2s")->insert(["nome" => "Calça jeans", "preco" => 120, "estoque" => 1, "categoria2_id" => 1]);
        DB::table("produto2s")->insert(["nome" => "Camiseta manga longa", "preco" => 34, "estoque" => 2, "categoria2_id" => 1]);
        DB::table("produto2s")->insert(["nome" => "PC gamer", "preco" => 56, "estoque" => 4, "categoria2_id" => 2]);
        DB::table("produto2s")->insert(["nome" => "Impressora", "preco" => 37, "estoque" => 5, "categoria2_id" => 6]);
        DB::table("produto2s")->insert(["nome" => "mouse", "preco" => 37, "estoque" => 6, "categoria2_id" => 6]);
        DB::table("produto2s")->insert(["nome" => "perfume", "preco" => 55, "estoque" => 7, "categoria2_id" => 3]);
        DB::table("produto2s")->insert(["nome" => "cama de casal", "preco" => 11, "estoque" => 8, "categoria2_id" => 4]);
        DB::table("produto2s")->insert(["nome" => "moveis", "preco" => 1, "estoque" => 8, "categoria2_id" => 4]);
    }
}
