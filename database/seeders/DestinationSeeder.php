<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destination::create([
            'destination_type_id' => 1,
            'village_id' => '1101022007',
            'name' => 'Biduk-biduk',
            'image' => 'Pantai-Biduk-Biduk.jpg',
            'description' => '
                <p>
                    Pantai Biduk Biduk merupakan pantai yang memiliki pasir putih serta air laut jernih yang nampak
                    berwarna biru. Kemudian, komdisi alamnya pun masih sangat asri dan masih jarang pula orang
                    berkunjung kesini.
                </p>
                <p>
                    Maka dari itu, bila datang pada waktu tertentu pengunjung akan merasa seperti pantai pribadi. Pada
                    saat berada di pantai Biduk-Biduk, pengunjung dapat menyaksikan pemandangan laut Sulawesi serta
                    merasakan semilir angin yang menyejukan.
                </p>',
            'guide' => 'Rifky Martha Hadian Firmana',
            'price' => '3000000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Destination::create([
            'destination_type_id' => 2,
            'village_id' => '1101022008',
            'name' => 'Air terjun Tembalang',
            'image' => 'air-terjun-tembalang.jpg',
            'description' => '
                <p>
                    Objek wisata di Kabupaten Berau yang cukup wajib kamu kunjungi salah satunya adalah Air Terjun Tembalang. Untuk lokasinya sendiri terletak di Kampung Tepian Buah dan masih di dalam wilayah Kecamatan Segah. Namun untuk menuju air terjun kamu harus menempuh selama 2 jam dengan berjalan kaki sembari menikmati indahnya alam pedesaan. Tapi dijamin kamu tidak akan kecewa setelah melihat keindahan Air Terjun Tembalang. Sudah pasti nyebur ke kolam air terjunnya menjadi hal yang sangat wajib kamu lakukan. Selain itu kamu juga bisa menyusuri sungai yang ada di lokasi air terjun dengan menggunakan ban pelampung. Tempat wisata di Kaltim ini juga sangat pas untuk berkemah sembali memancing di Sungai Tembalang yang tak jauh dari lokasi Air Terjun Tembalang.
                </p>',
            'guide' => 'Bima Rizky',
            'price' => '6500000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Destination::create([
            'destination_type_id' => 1,
            'village_id' => '1101022009',
            'name' => 'Sangalaki',
            'image' => 'sangalaki.jpg',
            'description' => '
                <p>
                    Pulau Kalimantan memang terkenal memiliki banyak surga tersembunyi didalamnya. Pulau yang dikenal sebagai pulau terbesar di Indonesia ini memiliki beberapa pulau kecil yang pemandangannya memanjakan mata. Salah satunya adalah Pulau Sangalaki, yang terletak di Kepulauan Derawan, Berau, Kalimantan Timur ini terkenal dengan keindahan taman bawah lautnya dan sebagai penangkaran penyu.
                </p>',
            'guide' => 'Haidar',
            'price' => '8900000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
