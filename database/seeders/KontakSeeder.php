<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kontaks')->insert([
            [
                'nama' => 'Telepon',
                'icon' => 'phone-icon.png',
                'deskripsi' => 'Hubungi kami melalui telepon.',
            ],
            [
                'nama' => 'Email',
                'icon' => 'email-icon.png',
                'deskripsi' => 'Kirim email untuk pertanyaan lebih lanjut.',
            ],
            [
                'nama' => 'WhatsApp',
                'icon' => 'whatsapp-icon.png',
                'deskripsi' => 'Kontak kami melalui WhatsApp.',
            ],
        ]);
    }
}
