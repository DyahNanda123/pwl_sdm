<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Jangan lupa untuk import DB facade
use App\Models\KategoriKegiatan;

class KategoriKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriKegiatan = [
            [
                'nama_kategori' => 'Kegiatan Terprogram',
                'deskripsi' => 'Kegiatan yang telah direncanakan sebelumnya dan memiliki jadwal tetap.'
            ],
            [
                'nama_kategori' => 'Kegiatan Non-Terprogram',
                'deskripsi' => 'Kegiatan yang tidak memiliki jadwal tetap dan dilakukan sesuai kebutuhan.'
            ],
            [
                'nama_kategori' => 'Kegiatan Non-JTI',
                'deskripsi' => 'Kegiatan yang tidak termasuk dalam jurusan Teknik Informatika.'
            ],
        ];

        // Memasukkan data ke dalam tabel 'kategori_kegiatan'
        DB::table('kategori_kegiatan')->insert($kategoriKegiatan);
    }
}
