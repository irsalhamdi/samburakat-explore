<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Owner::create([
            'name' => 'Hendrawan',
            'village_id' => '1101022007',
            'phone_number' => '082140091385',
            'type' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
