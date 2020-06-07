<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(Categoria2Seeder::class);
        $this->call(Produto2Seeder::class);
        $this->call(ProjetosSeeder::class);
        $this->call(DesenvolvedoresSeeder::class);
        $this->call(AlocacoesSeeder::class);
    }
}
