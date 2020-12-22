<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cinema = Cinema::factory()->create();
        Movie::factory()
            ->count(10)
            ->for($cinema)
            ->create();
    }
}
