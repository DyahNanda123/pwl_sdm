<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_detail_kegiatan')->insert([
            [
                'id' => 31,
                'kegiatan_id' => 4,
                'nip' => '1122334455',
                'jabatan' => 'PIC',
                'bobot' => 8
            ],
            [
                'id' => 32,
                'kegiatan_id' => 5,
                'nip' => '1234567890',
                'jabatan' => 'Sekretaris',
                'bobot' => 6
            ],
            [
                'id' => 33,
                'kegiatan_id' => 6,
                'nip' => '1234567890',
                'jabatan' => 'Bendahara',
                'bobot' => 6
            ]
        ]);
    }
}
