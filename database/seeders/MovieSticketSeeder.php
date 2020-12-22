<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSticketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = Movie::factory()->create();
        Movie::factory()
            ->count(10)
            ->for($movie)
            ->create();
    }
}
