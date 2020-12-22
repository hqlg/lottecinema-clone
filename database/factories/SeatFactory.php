<?php

namespace Database\Factories;

use App\Models\Seat;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'seat_position_id' => $this->faker->randomNumber(5),
            'type_seat_id' => $this->faker->randomNumber(5),
            'movie_sticket_id' => $this->faker->randomNumber(5),
        ];
    }
}
