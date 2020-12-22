<?php

namespace Database\Seeders;

use App\Models\Seat;
use App\Models\SeatPosition;
use App\Models\TypeSeat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seat::factory()
            ->count(10)
            ->create();
    }
}
