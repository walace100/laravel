<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\TerProduto;

class TerProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 1000) as $index){
            TerProduto::create([
                "nome" => $faker->word,
                "preco" => $faker->randomFloat(2, 1, 1000)
            ]);
        }
    }
}
