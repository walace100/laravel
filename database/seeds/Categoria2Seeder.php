<?php

use Illuminate\Database\Seeder;

class Categoria2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categoria2s")->insert(["nome" => "Roupas"]);
        DB::table("categoria2s")->insert(["nome" => "Eletronicos"]);
        DB::table("categoria2s")->insert(["nome" => "Perfumes"]);
        DB::table("categoria2s")->insert(["nome" => "Móveis"]);
        DB::table("categoria2s")->insert(["nome" => "Alimentos"]);
        DB::table("categoria2s")->insert(["nome" => "Informatica"]);
    }
}
