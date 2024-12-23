<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedsosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medsos')->insert([
            [
                'nama' => 'Facebook',
                'icon' => 'facebook-icon.png',
                'link' => 'https://facebook.com',
            ],
            [
                'nama' => 'Twitter',
                'icon' => 'twitter-icon.png',
                'link' => 'https://twitter.com',
            ],
            [
                'nama' => 'Instagram',
                'icon' => 'instagram-icon.png',
                'link' => 'https://instagram.com',
            ],
        ]);
    }
}
