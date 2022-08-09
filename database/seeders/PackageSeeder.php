<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'hotel_id' => 1,
            'name' => 'Derawan Trip',
            'thumbnail' => 'default2.jpg',
            'description' => '<p>Kepulauan Derawan adalah sebuah kepulauan yang berada di Kabupaten Berau, Kalimantan Timur. Di kepulauan ini terdapat sejumlah objek wisata bahari menawan, salah satunya Taman Bawah Laut yang diminati wisatawan mancanegara terutama para penyelam kelas dunia</p>',
            'day' => 2,
            'night' => 1,
            'price' => 100000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Package::create([
            'hotel_id' => 1,
            'name' => 'Wisata Sejarah',
            'thumbnail' => 'default2.jpg',
            'description' => '<p>Kepulauan Derawan adalah sebuah kepulauan yang berada di Kabupaten Berau, Kalimantan Timur. Di kepulauan ini terdapat sejumlah objek wisata bahari menawan, salah satunya Taman Bawah Laut yang diminati wisatawan mancanegara terutama para penyelam kelas dunia</p>',
            'day' => 3,
            'night' => 2,
            'price' => 150000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
