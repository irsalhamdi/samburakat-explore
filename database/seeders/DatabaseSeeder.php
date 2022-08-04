<?php

namespace Database\Seeders;

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
        \App\Models\Admin::factory()->create();
        $this->call(IndoRegionSeeder::class);
        $this->call(DestinationTypeSeeder::class);
        $this->call(DestinationSeeder::class);
        // $this->call(Packages::class);
        // $this->call(DestinationPackages::class);
    }
}
