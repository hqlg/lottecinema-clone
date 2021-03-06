<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'cinema_id' => $this->faker->randomNumber(5),
            'price' => $this->faker->randomFloat,
            'img_url' => $this->faker->word,
            'release_date' => $this->faker->dateTime,
        ];
    }
}
