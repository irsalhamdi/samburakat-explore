<?php

namespace Database\Seeders;

use App\Models\DestinationPackages;
use Illuminate\Database\Seeder;

class DestinationPackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DestinationPackages::create([
            'destination_id' => 1,
            'package_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DestinationPackages::create([
            'destination_id' => 2,
            'package_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DestinationPackages::create([
            'destination_id' => 3,
            'package_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
