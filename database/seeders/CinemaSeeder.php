<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cinema;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = Area::factory()->create();
        Cinema::factory()
            ->count(10)
            ->for($area)
            ->create();
    }
}
