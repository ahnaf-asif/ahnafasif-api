<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 1; $i <= 150;$i++){
            Portfolio::create([
                'title' => $faker->realText(40),
                'archive' => 1,
                'short_description' => $faker->realText(200),
                'long_description' => $faker->realText(5000),
                'cover_pic' => 'https://i.imgur.com/0b4T5mp.jpg',
                'link' => 'https://duoblogger.github.io'
            ]);
        }
    }
}
