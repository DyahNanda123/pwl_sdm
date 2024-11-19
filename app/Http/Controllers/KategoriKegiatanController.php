<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KategoriKegiatanController extends Controller
{
    // Menampilkan halaman daftar kategori kegiatan
    public function index()
{
    $breadcrumb = (object) [
        'title' => 'Daftar Kategori Kegiatan',
        'list' => ['Home', 'Kategori Kegiatan']
    ];
    $page = (object) [
        'title' => 'Daftar kategori kegiatan yang terdaftar dalam sistem'
    ];
    $activeMenu = 'kategori_kegiatan'; // set menu yang sedang aktif

    $kategori_kegiatan = KategoriKegiatan::all(); // ubah nama variabel menjadi $kategori_kegiatan

    return view('kategori_kegiatan.index', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'kategori_kegiatan' => $kategori_kegiatan, // sesuaikan nama variabel
        'activeMenu' => $activeMenu
    ]);
}


    // Ambil data kategori kegiatan dalam bentuk JSON untuk datatables
    public function list(Request $request)
    {
        $kategoriKegiatan = KategoriKegiatan::select('id', 'nama_kategori', 'deskripsi');

        // Filter data kategori kegiatan berdasarkan ID
        // if ($request->id) {
        //     $kategoriKegiatan->where('id', $request->id);
        // }

        return DataTables::of($kategoriKegiatan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategoriKegiatan) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/kategori_kegiatan/' . $kategoriKegiatan->id) . '" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="' . url('/kategori-kegiatan/' . $kategoriKegiatan->id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' . 
                //     url('/kategori-kegiatan/' . $kategoriKegiatan->id) . '">'
                //     . csrf_field() . method_field('DELETE') . 
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }

  

    // Menampilkan detail kategori kegiatan
    public function show(string $id)
    {
        $kategoriKegiatan = KategoriKegiatan::find($id);

        if (!$kategoriKegiatan) {
            return redirect('/kategori_kegiatan')->with('error', 'Data kategori kegiatan tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Detail Kategori Kegiatan',
            'list' => ['Home', 'Kategori Kegiatan', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail kategori kegiatan'
        ];
        $activeMenu = 'kategori_kegiatan'; // set menu yang sedang aktif
        return view('kategori_kegiatan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategoriKegiatan' => $kategoriKegiatan, 'activeMenu' => $activeMenu]);
    }
}
