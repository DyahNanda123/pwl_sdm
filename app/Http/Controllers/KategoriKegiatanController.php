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

        $kategoriKegiatan = KategoriKegiatan::all(); // ambil data kategori kegiatan

        return view('kategori_kegiatan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategoriKegiatan' => $kategoriKegiatan, 'activeMenu' => $activeMenu]);
    }

    // Ambil data kategori kegiatan dalam bentuk JSON untuk datatables
    public function list(Request $request)
    {
        $kategoriKegiatan = KategoriKegiatan::select('id', 'nama_kategori', 'deskripsi');

        // Filter data kategori kegiatan berdasarkan ID
        if ($request->id) {
            $kategoriKegiatan->where('id', $request->id);
        }

        return DataTables::of($kategoriKegiatan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategoriKegiatan) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/kategori-kegiatan/' . $kategoriKegiatan->id) . '" class="btn btn-info btn-sm">Detail</a> ';
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

    // Menampilkan halaman form tambah kategori kegiatan
    // public function create()
    // {
    //     $breadcrumb = (object) [
    //         'title' => 'Tambah Kategori Kegiatan',
    //         'list' => ['Home', 'Kategori Kegiatan', 'Tambah']
    //     ];
    //     $page = (object) [
    //         'title' => 'Tambah kategori kegiatan baru'
    //     ];

    //     $activeMenu = 'kategori_kegiatan'; // set menu yang sedang aktif
    //     return view('kategori_kegiatan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    // }

    // // Menyimpan data kategori kegiatan baru
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama_kategori' => 'required|string|unique:kategori_kegiatan,nama_kategori', // nama_kategori harus unik
    //         'deskripsi' => 'nullable|string' // deskripsi boleh kosong
    //     ]);

    //     KategoriKegiatan::create([
    //         'nama_kategori' => $request->nama_kategori,
    //         'deskripsi' => $request->deskripsi,
    //     ]);

    //     return redirect('/kategori-kegiatan')->with('success', 'Data kategori kegiatan berhasil disimpan');
    // }

    // Menampilkan detail kategori kegiatan
    public function show(string $id)
    {
        $kategoriKegiatan = KategoriKegiatan::find($id);

        if (!$kategoriKegiatan) {
            return redirect('/kategori-kegiatan')->with('error', 'Data kategori kegiatan tidak ditemukan');
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

    // Menampilkan halaman form edit kategori kegiatan
    // public function edit(string $id)
    // {
    //     $kategoriKegiatan = KategoriKegiatan::find($id);

    //     if (!$kategoriKegiatan) {
    //         return redirect('/kategori-kegiatan')->with('error', 'Data kategori kegiatan tidak ditemukan');
    //     }

    //     $breadcrumb = (object) [
    //         'title' => 'Edit Kategori Kegiatan',
    //         'list' => ['Home', 'Kategori Kegiatan', 'Edit']
    //     ];

    //     $page = (object) [
    //         'title' => 'Edit kategori kegiatan'
    //     ];

    //     $activeMenu = 'kategori_kegiatan'; // set menu yang sedang aktif
    //     return view('kategori_kegiatan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategoriKegiatan' => $kategoriKegiatan, 'activeMenu' => $activeMenu]);
    // }

    // // Menyimpan perubahan data kategori kegiatan
    // public function update(Request $request, string $id)
    // {
    //     $request->validate([
    //         'nama_kategori' => 'required|string|unique:kategori_kegiatan,nama_kategori,' . $id . ',id', // memastikan nama_kategori unik
    //         'deskripsi' => 'nullable|string'
    //     ]);

    //     $kategoriKegiatan = KategoriKegiatan::find($id);

    //     if (!$kategoriKegiatan) {
    //         return redirect('/kategori-kegiatan')->with('error', 'Data kategori kegiatan tidak ditemukan');
    //     }

    //     $kategoriKegiatan->update([
    //         'nama_kategori' => $request->nama_kategori,
    //         'deskripsi' => $request->deskripsi
    //     ]);

    //     return redirect('/kategori-kegiatan')->with('success', 'Data kategori kegiatan berhasil diubah');
    // }

    // // Menghapus data kategori kegiatan
    // public function destroy(string $id)
    // {
    //     $kategoriKegiatan = KategoriKegiatan::find($id);

    //     if (!$kategoriKegiatan) {
    //         return redirect('/kategori-kegiatan')->with('error', 'Data kategori kegiatan tidak ditemukan');
    //     }

    //     try {
    //         $kategoriKegiatan->delete(); // Hapus data kategori kegiatan
    //         return redirect('/kategori-kegiatan')->with('success', 'Data kategori kegiatan berhasil dihapus');
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         return redirect('/kategori-kegiatan')->with('error', 'Data kategori kegiatan gagal dihapus karena masih terkait dengan data lain');
    //     }
    // }
}
