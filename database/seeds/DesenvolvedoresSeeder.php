<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("desenvolvedores")->insert(["nome" => "Bernardo Silva", "cargo" => "Analista pleno"]);
        DB::table("desenvolvedores")->insert(["nome" => "Carlos Arnaldo", "cargo" => "Analista senior"]);
        DB::table("desenvolvedores")->insert(["nome" => "Walace Paz", "cargo" => "programador junior"]);
    }
}
