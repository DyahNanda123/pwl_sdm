<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KegiatanController extends Controller
{
    // Menampilkan halaman daftar kegiatan
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kegiatan',
            'list' => ['Home', 'Kegiatan']
        ];
        $page = (object) [
            'title' => 'Daftar kegiatan yang terdaftar dalam sistem'
        ];
        $activeMenu = 'kategori-kegiatan'; // set menu yang sedang aktif

        return view('kegiatan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Ambil data kegiatan dalam bentuk JSON untuk datatables
    public function list(Request $request)
    {
        $kegiatan = Kegiatan::select('id', 'kategori_id', 'nama_kegiatan', 'tanggal_pelaksanaan', 'detail_kegiatan');

        // Filter data kegiatan berdasarkan kategori
        if ($request->kategori_id) {
            $kegiatan->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kegiatan)
            ->addIndexColumn()
            ->addColumn('kategori', function ($kegiatan) {
                return $kegiatan->kategori->kategori_nama; // Assuming 'kategori' is related to the KategoriKegiatan model
            })
            ->addColumn('aksi', function ($kegiatan) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/kegiatan/' . $kegiatan->id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kegiatan/' . $kegiatan->id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kegiatan/' . $kegiatan->id) . '">'
                    . csrf_field() . method_field('DELETE') . 
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }

    // Menampilkan halaman form tambah kegiatan
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kegiatan',
            'list' => ['Home', 'Kegiatan', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah kegiatan baru'
        ];

        $kategoriKegiatan = KategoriKegiatan::all(); // Ambil semua kategori kegiatan untuk dropdown
        $activeMenu = 'kategori-kegiatan'; // set menu yang sedang aktif
        return view('kegiatan.create', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'kategoriKegiatan' => $kategoriKegiatan,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan data kegiatan baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_kegiatan,id', // Pastikan kategori_id ada dalam tabel kategori_kegiatan
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'detail_kegiatan' => 'required|string',
        ]);

        Kegiatan::create([
            'kategori_id' => $request->kategori_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'detail_kegiatan' => $request->detail_kegiatan,
        ]);

        return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil disimpan');
    }

    // Menampilkan detail kegiatan
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return redirect('/kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Detail Kegiatan',
            'list' => ['Home', 'Kegiatan', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail kegiatan'
        ];
        $activeMenu = 'kategori-kegiatan'; // set menu yang sedang aktif
        return view('kegiatan.show', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'kegiatan' => $kegiatan, 
            'activeMenu' => $activeMenu
        ]);
    }

    // Menampilkan halaman form edit kegiatan
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return redirect('/kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Edit Kegiatan',
            'list' => ['Home', 'Kegiatan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit kegiatan'
        ];

        $kategoriKegiatan = KategoriKegiatan::all(); // Ambil semua kategori kegiatan untuk dropdown
        $activeMenu = 'kategori-kegiatan'; // set menu yang sedang aktif
        return view('kegiatan.edit', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'kegiatan' => $kegiatan, 
            'kategoriKegiatan' => $kategoriKegiatan, 
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data kegiatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_kegiatan,id',
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'detail_kegiatan' => 'required|string',
        ]);

        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return redirect('/kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
        }

        $kegiatan->update([
            'kategori_id' => $request->kategori_id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'detail_kegiatan' => $request->detail_kegiatan,
        ]);

        return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil diubah');
    }

    // Menghapus data kegiatan
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return redirect('/kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
        }

        try {
            $kegiatan->delete(); // Hapus data kegiatan
            return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/kegiatan')->with('error', 'Data kegiatan gagal dihapus karena masih terkait dengan data lain');
        }
    }
}
