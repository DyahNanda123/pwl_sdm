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
                'user_id' => 1,
                'NIP' => '123456789',
                'nama' => 'Dyah',
                'email' => 'dyah@gmail.com',
                'password' => Hash::make('12345'), // password di-hash untuk keamanan
                'role' => 1, // Sesuai dengan level_id pada tabel level
            ],
            [
                'user_id' => 2,
                'NIP' => '987654321',
                'nama' => 'Nabila',
                'email' => 'nabila@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 2,
            ],
            [
                'user_id' => 3,
                'NIP' => '123123123',
                'nama' => 'Sandrina',
                'email' => 'sandrina@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 3,
            ],
        ];

        DB::table('user')->insert($data);
    }
}
