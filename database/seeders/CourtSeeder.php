<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Court;

class CourtSeeder extends Seeder
{
    public function run()
    {
        $data = [

            // =======================
            // P A D E L (5)
            // =======================
            [
                'type' => 'Padel',
                'name' => 'Neron Padel Court',
                'location' => 'Jl. Sutoyo No. 69, Kebun Jeruk',
                'description' => 'Lapangan padel premium dengan fasilitas lengkap.',
                'price' => 150000,
                'ratings' => 4.5,
                'image' => 'assets/img/octo.jpg',
            ],
            [
                'type' => 'Padel',
                'name' => 'PadelPro Kemang',
                'location' => 'Kemang Raya No. 12, Jakarta Selatan',
                'description' => 'Padel court modern dengan lighting profesional.',
                'price' => 140000,
                'ratings' => 4.6,
                'image' => 'assets/img/kemang 1.jpg',
            ],
            [
                'type' => 'Padel',
                'name' => 'Karamoi Padel Court',
                'location' => 'Jl. Durian No. 44, Depok',
                'description' => 'Court nyaman dengan fasilitas parkir luas.',
                'price' => 130000,
                'ratings' => 4.4,
                'image' => 'assets/img/karamoi.jpg',
            ],
            [
                'type' => 'Padel',
                'name' => 'Elite Padel Court',
                'location' => 'Jl. Mangga Besar No. 8',
                'description' => 'Padel court standar internasional.',
                'price' => 160000,
                'ratings' => 4.7,
                'image' =>'assets/img/elite.jpg',
            ],
            [
                'type' => 'Padel',
                'name' => 'Champion Padel Arena',
                'location' => 'Jl. Raya Bogor No. 21',
                'description' => 'Arena padel berstandar turnamen.',
                'price' => 155000,
                'ratings' => 4.6,
                'image' => 'assets/img/champion.jpg',
            ],

            // =======================
            // B A S K E T (5)
            // =======================
            [
                'type' => 'Basketball',
                'name' => 'Lebron Basketball Park',
                'location' => 'Oasis St. No. 6, Depok',
                'description' => 'Outdoor court luas dengan ring profesional.',
                'price' => 120000,
                'ratings' => 4.4,
                'image' => 'assets/img/lebron.jpg',
            ],
            [
                'type' => 'Basketball',
                'name' => 'Letsplay Basketball Court',
                'location' => 'Jl. Melati No. 10',
                'description' => 'Indoor court dengan lantai vinyl.',
                'price' => 110000,
                'ratings' => 4.3,
                'image' => 'assets/img/play.jpg',
            ],
            [
                'type' => 'Basketball',
                'name' => 'Neron Indoor Court',
                'location' => 'Jl. Veteran No. 33',
                'description' => 'Court indoor full AC.',
                'price' => 150000,
                'ratings' => 4.6,
                'image' => 'assets/img/allstar.jpg',
            ],
            [
                'type' => 'Basketball',
                'name' => 'Hoops Central Court',
                'location' => 'Jl. Brawijaya No. 7',
                'description' => 'Court basket dengan ring adjustable.',
                'price' => 130000,
                'ratings' => 4.5,
                'image' => 'assets/img/wtp2.jpg',
            ],
            [
                'type' => 'Basketball',
                'name' => 'Metro Basketball Arena',
                'location' => 'Jl. Dahlia No. 99',
                'description' => 'Arena luas dengan fasilitas lengkap.',
                'price' => 140000,
                'ratings' => 4.4,
                'image' => 'assets/img/wtp3.jpg',
            ],

            // =======================
            // S O C C E R (5)
            // =======================
            [
                'type' => 'Soccer',
                'name' => 'Asonn Mini Soccer',
                'location' => 'Sudirman St. No 20, Sukabumi',
                'description' => 'Mini soccer field dengan rumput sintetis premium.',
                'price' => 200000,
                'ratings' => 4.5,
                'image' => 'assets/img/ason.jpg',
            ],
            [
                'type' => 'Soccer',
                'name' => 'EVOS Soccer Court',
                'location' => 'Jl. Mawar No. 11',
                'description' => 'Lapangan dengan pencahayaan malam hari.',
                'price' => 180000,
                'ratings' => 4.6,
                'image' => 'assets/img/evos.jpg',
            ],
            [
                'type' => 'Soccer',
                'name' => 'Happyhour Mini Soccer',
                'location' => 'Jl. Kenanga No. 32',
                'description' => 'Mini soccer full rumput sintetis generasi terbaru.',
                'price' => 170000,
                'ratings' => 4.4,
                'image' => 'assets/img/mini.jpg',
            ],
            [
                'type' => 'Soccer',
                'name' => 'Galaxy Soccer Center',
                'location' => 'Jl. Satria No. 28',
                'description' => 'Arena soccer dengan tribun penonton.',
                'price' => 210000,
                'ratings' => 4.5,
                'image' => 'assets/img/arena.jpg',
            ],
            [
                'type' => 'Soccer',
                'name' => 'Champion Mini Football',
                'location' => 'Jl. Pratama No. 8',
                'description' => 'Lapangan sepak bola mini standar kompetisi.',
                'price' => 220000,
                'ratings' => 4.6,
                'image' => 'assets/img/golden.jpg'
            ],
        ];

        Court::upsert(
            $data,
            ['name'], 
            ['location', 'description', 'price', 'ratings', 'image'] 
        );

    }
}
