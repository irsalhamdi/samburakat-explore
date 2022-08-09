<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    public function run()
    {
        Seo::create([
            'id' => 1,
            'meta_title' => 'Samburakat Explore',
            'meta_author' => 'Irsal Hamdi',
            'meta_keyword' => 'Samburakat, Explore, Berau, Kalimantan Timur',
            'meta_description' => 'A project buil for tourism',
            'google_analytics' => 'xxxxxx',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
