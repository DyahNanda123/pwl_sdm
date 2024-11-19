<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kegiatan_id' => 4, // ID kegiatan yang valid (sesuaikan dengan yang ada di tabel kegiatan)
                'nip' => '123456789', // NIP yang sudah ada
                'tanggal' => '2024-11-01',
                'deskripsi' => 'Membajak lahan',
            ],
            [
                'kegiatan_id' => 5, // ID kegiatan yang valid (sesuaikan dengan yang ada di tabel kegiatan)
                'nip' => '987654321', // NIP yang sudah ada
                'tanggal' => '2024-11-02',
                'deskripsi' => 'Menanam benih',
            ],
            [
                'kegiatan_id' => 6, // ID kegiatan yang valid (sesuaikan dengan yang ada di tabel kegiatan)
                'nip' => '123123123', // NIP yang sudah ada
                'tanggal' => '2024-11-03',
                'deskripsi' => 'Memberi pupuk',
            ],
        ];

        DB::table('progres')->insert($data);
    }
}
