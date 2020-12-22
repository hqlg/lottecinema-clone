<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cinema;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Area::factory(10)->create();
        Cinema::factory(10)->create();
        Movie::factory(10)->create();
    }
}
