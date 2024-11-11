<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class levelController extends Controller
{
    public function index()
    {
    //    DB::insert('insert into level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);

    //    return 'Insert data baru berhasil';

    //   $row = DB::update('update level set level_nama = ? where level_kode = ?',['Customer', 'CUS']);
    //   return 'Update data berasil. Jumlah data yang diupdate: '.$row. 'baris';

    //   $row = DB::delete('delete from level where level_kode = ?', ['CUS']);
    //   return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. 'baris';

      $data = DB::select('select * from level');
      return view('level', ['data' => $data]);
    }
}