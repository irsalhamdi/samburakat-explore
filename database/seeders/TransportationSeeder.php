<?php

namespace Database\Seeders;

use App\Models\Transportation;
use Illuminate\Database\Seeder;

class TransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transportation::create([
            'owner_id' => 1,
            'name' => 'speedboot',
            'image' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
