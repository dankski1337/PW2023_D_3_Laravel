<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role' => 'customer',
            'photo' => null,
            'status' => 1,
            'nama' => 'c',
            'username' => 'c',
            'email' => 'c@gmail.com',
            'password' => Hash::make('c'),
            'alamat' => 'jl. c',
            'no_telp' => '081',
            'verify_key' => '22aa',
        ]);
    }
}
