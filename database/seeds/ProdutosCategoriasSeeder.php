<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\TerProduto;
use App\TerCategoria;
use App\ProdutoCategoria;


class ProdutosCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $prods = TerProduto::all();
        $cats = TerCategoria::all()->pluck("id")->toArray();
        foreach($prods as $p){
            $elementos = rand(2, 6);
                do {
                    $cat_id = $faker->randomElement($cats);
                } while(ProdutoCategoria::where("ter_produto_id", $p->id)->where("ter_categoria_id", $cat_id)->exists());
                if(!ProdutoCategoria::where("ter_produto_id", $p->id)->where("ter_categoria_id", $cat_id)->exists()){
                    ProdutoCategoria::create([
                        "ter_produto_id" => $p->id,
                        "ter_categoria_id" => $cat_id
                    ]);
                }
        }
    }
}
