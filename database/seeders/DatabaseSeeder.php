<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Produit;
use App\Models\Category;
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
        // Produit::factory(10)->create();


        Category::factory()->count(10)->create();
        Type::factory()->count(3)->create();


        $ids = range(1, 10);
        Produit::factory()->count(20)->create()->each(function ($produit) use($ids){

        shuffle($ids);

        $produit->categories()->attach(array_slice($ids, 0, rand(1, 4)));

    });



        // Type::factory()->has(Produit::factory()->count(4))->count(10)->create();



    }
}
