<?php

namespace Database\Factories;

use App\Models\TypeSeat;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeSeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeSeat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat,
            'name' => $this->faker->name,
        ];
    }
}
