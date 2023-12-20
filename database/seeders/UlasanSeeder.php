<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create ulasan data
        DB::table('ulasans')->insert([
            'id_user' => 2,
            'tanggal' => '2021-01-01',
            'rating' => 'Cukup',
            'ulasan' => 'Pelayanan cukup baik, tapi mobilnya kurang bagus',
            'created_at' => '2021-01-01 00:00:00',
        ]);
    }
}
