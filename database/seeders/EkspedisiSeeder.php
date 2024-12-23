<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EkspedisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ekspedisis')->insert([
            [
                'nama' => 'JNE', // Nama ekspedisi pertama
            ],
            [
                'nama' => 'TIKI', // Nama ekspedisi kedua
            ],
            [
                'nama' => 'Pos Indonesia', // Nama ekspedisi ketiga
            ],
        ]);
    }
}
