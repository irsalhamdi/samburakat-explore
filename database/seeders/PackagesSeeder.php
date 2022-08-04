<?php

namespace Database\Seeders;

use App\Models\Packages;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packages::create([
            'name' => 'Derawan Trip',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Packages::create([
            'name' => 'Wisata Sejarah',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
