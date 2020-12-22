<?php

namespace Database\Seeders;

use App\Models\TypeSeat;
use Illuminate\Database\Seeder;

class TypeSeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeSeat::factory()
            ->hasSeats(10)
            ->create();
    }
}
