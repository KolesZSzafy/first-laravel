<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->truncate();

        $faker = Factory::create();

        $query = [];
        for ($i = 0; $i < 1000; $i++) {
            $title = $faker->word;
            $query[] = [
                'title' => $title,
                'description' => $faker->text(300),
                'publisher' => $faker->word . ' ' . $faker->word,
                'score' => $faker->randomFloat(1, 0, 5),
                'created_at' => $faker->dateTimeBetween('-1 year', '-1 week'),
                'genre_id' => $faker->numberBetween(1, 5),
                'img_path' => $faker->imageUrl(640, 480, $title, true)
            ];
        }
        DB::table('games')->insert($query);
    }
}
