<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1, // ID pengguna, pastikan ID ini ada di tabel users
                'produk_id' => 1, // ID produk, pastikan ID ini ada di tabel produk
                'kota_id' => 1, // ID kota, pastikan ID ini ada di tabel kota
                'ekspedisi_id' => 1, // ID ekspedisi, pastikan ID ini ada di tabel ekspedisi
                'total' => 15000.00,
                'status' => 'pending', // Status order
            ],
            [
                'user_id' => 2, // ID pengguna
                'produk_id' => 2, // ID produk
                'kota_id' => 2, // ID kota
                'ekspedisi_id' => 2, // ID ekspedisi
                'total' => 20000.00,
                'status' => 'shipped', // Status order
            ],
            [
                'user_id' => 1, // ID pengguna
                'produk_id' => 3, // ID produk
                'kota_id' => 3, // ID kota
                'ekspedisi_id' => 3, // ID ekspedisi
                'total' => 50000.00,
                'status' => 'delivered', // Status order
            ],
        ]);
    }
}
