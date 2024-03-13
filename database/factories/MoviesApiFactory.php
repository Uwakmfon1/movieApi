<?php

namespace Database\Factories;
// require_once 'vendor/autoload.php';

use App\Models\User;
use App\Models\MoviesApi;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoviesApi>
 */
class MoviesApiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Factory::create();
        return [
            'user_id' => User::factory(),
            'title'=>$this->faker->sentence,
            'year'=>$this->faker->year,
            'runtime'=>$this->faker->numberBetween(60,240),
            'genre'=>$this->faker->word,
            'synopsis'=>$this->faker->paragraph,
            'poster_url'=>$this->faker->imageUrl,
            'directors'=>$this->faker->name,
            'casts'=>$this->faker->name,
            'writers'=>$this->faker->name,
            'rating'=>$this->faker->randomFloat(1,1,10),
            'trailer_url'=>$this->faker->url,
            'release_date'=>$this->faker->date,
            'production_company'=>$this->faker->company,
        ];
    }
}
