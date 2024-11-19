<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'NIP' => '123456789',
                'level_id' => 3,
                'username' => 'Dyahhh',
                'nama' => 'Dyah Nanda',
                'email' => 'dyah@gmail.com',
                'no_telp' => '088227023906',
                'foto' => 'path/to/photo3.jpg',
                'alamat' => 'Jl. Kembang Pacar Malang',
                'password' => Hash::make('12345'), // password di-hash untuk keamanan
            ],
            [
                'NIP' => '987654321',
                'level_id' => 2,
                'username' => 'Nabilahh',
                'nama' => 'Nabila Hasna',
                'email' => 'nabila@gmail.com',
                'no_telp' => '088227023906',
                'foto' => 'path/to/photo3.jpg',
                'alamat' => 'Jl. Kembang Pacar Malang',
                'password' => Hash::make('12345'),
            ],
            [
                'NIP' => '123123123',
                'level_id' => 1,
                'username' => 'Sandrinaaa',
                'nama' => 'Sandrina Athallia',
                'no_telp' => '088227023906',
                'foto' => 'path/to/photo3.jpg',
                'alamat' => 'Jl. Kembang Pacar Malang',
                'email' => 'sandrina@gmail.com',
                'password' => Hash::make('12345'),
            ],
        ];

        DB::table('user')->insert($data);
    }
}
