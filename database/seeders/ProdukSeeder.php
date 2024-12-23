<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'kategori_id' => 1, // ID kategori, pastikan ID ini ada di tabel kategori
                'judul' => 'Tomat Segar',
                'slug' => 'tomat-segar',
                'harga' => 15000.00,
                'deskripsi' => 'Tomat segar dari kebun kami.',
                'gambar' => 'tomat-segar.jpg',
            ],
            [
                'kategori_id' => 2, // ID kategori, pastikan ID ini ada di tabel kategori
                'judul' => 'Apel Hijau',
                'slug' => 'apel-hijau',
                'harga' => 20000.00,
                'deskripsi' => 'Apel hijau segar dan manis.',
                'gambar' => 'apel-hijau.jpg',
            ],
            [
                'kategori_id' => 3, // ID kategori, pastikan ID ini ada di tabel kategori
                'judul' => 'Beras Organik',
                'slug' => 'beras-organik',
                'harga' => 50000.00,
                'deskripsi' => 'Beras organik berkualitas tinggi.',
                'gambar' => 'beras-organik.jpg',
            ],
        ]);
    }
}
