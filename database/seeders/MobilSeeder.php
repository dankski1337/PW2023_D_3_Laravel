<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mobils')->insert([
            'gambar' => 'gle400.png',
            'model' => 'Mercedes GLE 400',
            'bahan_bakar' => 'Bensin',
            'transmisi' => 'Automatic',
            'jumlah_kursi' => 5,
            'tahun_produksi' => 2015,
            'warna' => 'Putih',
            'tarif' => 200000,
            'status' => 'Tersedia',
            'created_at' => '2021-01-01 00:00:00',
        ]);
        DB::table('mobils')->insert([
            'gambar' => 'mobil1.png',
            'model' => 'Toyota Avanza',
            'bahan_bakar' => 'Bensin',
            'transmisi' => 'Manual',
            'jumlah_kursi' => 7,
            'tahun_produksi' => 2019,
            'warna' => 'Hitam',
            'tarif' => 200000,
            'status' => 'Tersedia',
            'created_at' => '2021-01-01 00:00:00',
        ]);
        DB::table('mobils')->insert([
            'gambar' => 'fortuner.png',
            'model' => 'Toyota Fortuner',
            'bahan_bakar' => 'Bensin',
            'transmisi' => 'Manual',
            'jumlah_kursi' => 7,
            'tahun_produksi' => 2015,
            'warna' => 'Putih',
            'tarif' => 250000,
            'status' => 'Tersedia',
            'created_at' => '2021-01-01 00:00:00',
        ]);
    }
}
