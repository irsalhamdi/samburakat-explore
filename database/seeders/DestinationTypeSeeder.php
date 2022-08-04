<?php

namespace Database\Seeders;

use App\Models\DestinationType;
use Illuminate\Database\Seeder;

class DestinationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DestinationType::create([
            'name' => 'Pantai',
            'image' => 'sangalaki_ori.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DestinationType::create([
            'name' => 'Air Terjun',
            'image' => 'air-terjun-tembalang.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DestinationType::create([
            'name' => 'Bangunan',
            'image' => 'keraton.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
