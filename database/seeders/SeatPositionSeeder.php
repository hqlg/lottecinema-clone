<?php

namespace Database\Seeders;

use App\Models\SeatPosition;
use Illuminate\Database\Seeder;

class SeatPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeatPosition::factory()
            ->hasSeats(10)
            ->create();
    }
}
