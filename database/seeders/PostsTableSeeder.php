<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i< 10; $i++){
            $newPost = new Post();

            $newPost->title = $faker->sentence();
            $newPost->author = $faker->name();
            $newPost->category = $faker->word();
            $newPost->content = $faker->paragraph();

            $newPost-> save();

        }
    }
}
