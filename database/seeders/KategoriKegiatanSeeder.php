<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Terprogram', 'deskripsi' => 'Kegiatan yang sudah direncanakan dalam kurikulum atau program resmi.'],
            ['nama_kategori' => 'Non Program', 'deskripsi' => 'Kegiatan tambahan di luar program wajib atau kurikulum.'],
            ['nama_kategori' => 'Non JTI', 'deskripsi' => 'Kegiatan yang tidak diselenggarakan oleh Jurusan Teknologi Informasi.'],
        ];

        DB::table('kategori_kegiatan')->insert($data);
    }
}
