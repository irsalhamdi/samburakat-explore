<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            'owner_id' => 1,
            'name' => 'Bumi segah',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
