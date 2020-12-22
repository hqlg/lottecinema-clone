<?php

namespace Database\Seeders;

use App\Models\GiftCategory;
use Illuminate\Database\Seeder;

class GiftCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GiftCategory::factory()
        ->hasGifts(10)
        ->create();
    }
}
