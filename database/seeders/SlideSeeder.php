<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('slides')->insert([
            [
                'gambar' => 'slide1.jpg', // Nama file gambar slide pertama
            ],
            [
                'gambar' => 'slide2.jpg', // Nama file gambar slide kedua
            ],
            [
                'gambar' => 'slide3.jpg', // Nama file gambar slide ketiga
            ],
        ]);
    }
}
