<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 1; $i <= 150;$i++){
            $categories = ['competitive programming', 'web developing', 'mathematics', 'machine learning'];
            Blog::create([
                'title' => $faker->realText(40),
                'archive' => 1,
                'short_description' => $faker->realText(200),
                'category' => $categories[rand(0, 3)],
                'thumbnail_image' => 'https://i.imgur.com/0b4T5mp.jpg',
                'cover_pic' => 'https://i.imgur.com/0b4T5mp.jpg',
                'blog' => $faker->realText(5000)
            ]);
        }
    }
}
