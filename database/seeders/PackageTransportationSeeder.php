<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PackageTransportation;

class PackageTransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PackageTransportation::create([
            'transportation_id' => 1,
            'package_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
