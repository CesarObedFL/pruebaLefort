<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoldItem;

class SoldItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SoldItem::factory()->count(50)->create();
    }
}