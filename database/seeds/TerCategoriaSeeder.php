<?php

use Illuminate\Database\Seeder;
use App\TerCategoria;
use Faker\Factory as Faker;

class TerCategoriaSeeder extends Seeder
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
            TerCategoria::create([
                "nome" => $faker->word
            ]);
        }
    }
}
