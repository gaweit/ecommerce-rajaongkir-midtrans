<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kotas')->insert([
            [
                'nama' => 'Jakarta',
                'biaya_ongkir' => 10000.00, // Biaya ongkir untuk Jakarta
            ],
            [
                'nama' => 'Bandung',
                'biaya_ongkir' => 8000.00, // Biaya ongkir untuk Bandung
            ],
            [
                'nama' => 'Surabaya',
                'biaya_ongkir' => 12000.00, // Biaya ongkir untuk Surabaya
            ],
        ]);
    }
}
