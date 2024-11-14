<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DaftarKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_kategori' => 1, // Pastikan ID ini sesuai dengan kategori di tabel kategori_kegiatan
                'nama_kegiatan' => 'Workshop Pemrograman',
                'tanggal_pelaksanaan' => Carbon::parse('2024-12-01'),
                'deskripsi' => 'Pelatihan pemrograman dasar untuk pemula.',
                'PIC' => 'Budi Setiawan',
                'status' => 'progres',
            ],
            [
                'id_kategori' => 2,
                'nama_kegiatan' => 'Seminar Teknologi',
                'tanggal_pelaksanaan' => Carbon::parse('2024-12-15'),
                'deskripsi' => 'Seminar teknologi terkini di industri.',
                'PIC' => 'Ani Rahmawati',
                'status' => 'complete',
            ],
            [
                'id_kategori' => 3,
                'nama_kegiatan' => 'Pengabdian Masyarakat',
                'tanggal_pelaksanaan' => Carbon::parse('2024-11-20'),
                'deskripsi' => 'Kegiatan pengabdian masyarakat di desa sekitar.',
                'PIC' => 'Sari Wijaya',
                'status' => 'progres',
            ],
        ];

        DB::table('daftar_kegiatan')->insert($data);
    }
}
