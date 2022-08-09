<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'id' => 1,
            'logo' => 'xxxx',
            'phone_one' => '081248765966',
            'phone_two' => '082140091385',
            'email' => 'irsalhamdi@gmail.com',
            'company_name' => 'Sambuarakat Project',
            'address' => 'Kampung Sambuarakt, Gunung Tabur, Kalimantan Timur',
            'facebook' => 'Sambuarakat Project',
            'instagram' => 'sambuarakatproject',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
