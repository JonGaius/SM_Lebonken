<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Articleattribute;
use App\Models\Boutique;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\Subcategory;
use App\Models\Subcategoryattribute;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        // Country::factory(20)->create();
        // Region::factory(30)->create();
        // City::factory(80)->create();
        // User::factory(10)->create();
        // Category::factory(10)->create();
        // Subcategory::factory(30)->create();
        // Subcategoryattribute::factory(60)->create();
        // Article::factory(180)->create();
        // Articleattribute::factory(300)->create();
        Boutique::factory(50)->create();

    }
}
