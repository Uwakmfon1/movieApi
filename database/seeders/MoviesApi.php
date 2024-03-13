<?php

namespace Database\Seeders;

// use App\Models\MoviesApi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class MoviesApi extends Seeder
{
    /**
     * Run the database seeds.
     */
    // $moviesApi = MoviesApi::create([
    //     'title' => $faker->title(),
    //     'year' => $faker->year(),
        // 'runtime' => $faker->runtime(),
        // 'genre' => $faker->genre(),
        // 'synopsis' => $faker->synopsis(),
        // 'poster_url' => $faker->poster_url(),
        // 'directors' => $faker->directors(),
        // 'cast' => $faker->cast(),
        // 'writers' => $faker->writers(),
        // 'ratings' => $faker->ratings(),
        // 'trailer_url' => $faker->trailer_url(),
        // 'release_date' => $faker->release_date(),
        // 'product_company' => $faker->product_company(),
    // ]);

    public function run(): void
    {
        $faker=Faker::create();
        $moviesApi = [];

        foreach(range(1,3) as $index){
            $moviesApi[] =[
              'title'=>$faker->text(15),
              'year'=>$faker->year,
              'runtime' => $faker->runtime,
              'genre' => $faker->genre,
              'synopsis' => $faker->synopsis,
              'poster_url' => $faker->poster_url,
              'directors' => $faker->directors,
              'cast' => $faker->cast,
              'writers' => $faker->writers,
              'ratings' => $faker->ratings,
              'trailer_url' => $faker->trailer_url,
              'release_date' => $faker->release_date,
              'product_company' => $faker->product_company,
            ];
        }
    }
}
