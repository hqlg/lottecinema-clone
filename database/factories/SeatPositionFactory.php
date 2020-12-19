<?php

namespace Database\Factories;

use App\Models\SeatPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatPositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SeatPosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'row' => $this->faker->randomLetter,
            'column' => $this->faker->randomDigit,
        ];
    }
}
