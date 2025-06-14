<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = [
            'sviluppo web',
            'framework',
            'internet',
            'tutorial',
            'news'
        ];

        foreach($tags as $tag){
            $newTag = new Tag();
            
            $newTag-> name=  $tag;
            $newTag-> color =$faker->hexColor();

            $newTag->save();
        };
    }
}
