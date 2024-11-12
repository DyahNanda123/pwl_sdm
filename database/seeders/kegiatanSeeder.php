<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kegiatan;
use App\Models\KategoriKegiatan;
use Carbon\Carbon;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada data kategori untuk referensi
        $kategori = KategoriKegiatan::first(); // Mengambil kategori pertama dari tabel kategori_kegiatan

        // Membuat data kegiatan dummy
        Kegiatan::create([
            'nama_kegiatan' => 'Pelatihan Pengembangan Diri',
            'kategori_id' => 1, // Menggunakan ID kategori yang ada
            'tanggal_pelaksanaan' => Carbon::parse('2024-12-01'), // Format tanggal sesuai kebutuhan
            'detail_kegiatan' => 'Pelatihan ini bertujuan untuk meningkatkan kemampuan pengembangan diri di lingkungan kampus.',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => 'Workshop Laravel dan API',
            'kategori_id' => 2, // Menggunakan ID kategori yang sama atau berbeda sesuai kebutuhan
            'tanggal_pelaksanaan' => Carbon::parse('2024-12-10'),
            'detail_kegiatan' => 'Workshop ini membahas tentang penggunaan Laravel dan pembuatan API.',
        ]);

        Kegiatan::create([
            'nama_kegiatan' => 'Seminar Teknologi Terbaru',
            'kategori_id' => 3, // Menggunakan ID kategori yang ada
            'tanggal_pelaksanaan' => Carbon::parse('2024-12-20'),
            'detail_kegiatan' => 'Seminar ini akan membahas teknologi terbaru di bidang IT dan inovasi teknologi.',
        ]);
    }
}
