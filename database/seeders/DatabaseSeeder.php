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
        \App\Models\User::factory()->create();
        $this->call(IndoRegionSeeder::class);
        // $this->call(DestinationTypeSeeder::class);
        // $this->call(DestinationSeeder::class);
        // $this->call(OwnerSeeder::class);
        // $this->call(HotelSeeder::class);
        // $this->call(PackageSeeder::class);
        // $this->call(DestinationPackagesSeeder::class);
        $this->call(TestimoniSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SeoSeeder::class);
    }
}
