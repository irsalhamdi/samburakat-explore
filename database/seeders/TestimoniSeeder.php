<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Seeder;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimony::create([
            'user_id' => 1,
            'description' => 'Gak cuma derawan yg exotic, ni travel punya service yg oks bangget, guide nya drivernya? gak perlu tanya salut banget baik, ramah, sabar, dan gokil. Gak sia-soa jauh-jauh ke berau pake tuor travel ini',
            'status' => 'Great',
        ]);
    }
}
