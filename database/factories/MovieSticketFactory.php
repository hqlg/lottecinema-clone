<?php

namespace Database\Factories;

use App\Models\MovieSticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieSticketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieSticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seat_id' => $this->faker->uuid,
            'movie_id' => $this->faker->uuid,
        ];
    }
}
