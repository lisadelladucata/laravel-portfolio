<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = ["laravel", "mysql", "php","internet", "videogiochi"];
        
        foreach($categories as $category){
            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->description = $faker->sentence();

            $newCategory->save();

        }
    }
}
