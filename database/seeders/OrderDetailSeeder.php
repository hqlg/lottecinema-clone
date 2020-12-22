<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderDetail::factory()
            ->count(10)
            ->forMovie([
                'name' => 'Abel'
            ])
            ->create();

    }
}
