<?php

namespace App\Http\Controllers;

use App\Models\DaftarKegiatan;
use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DaftarKegiatanController extends Controller
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
        $activeMenu = 'kegiatan';

        $daftarKegiatan = DaftarKegiatan::with('kategori')->get();

        return view('daftar_kegiatan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'daftarKegiatan' => $daftarKegiatan,
            'activeMenu' => $activeMenu
        ]);
    }

    // Ambil data kegiatan dalam bentuk JSON untuk datatables
    public function list(Request $request)
    {
        $daftar_kegiatan = DaftarKegiatan::select('id', 'id_kategori', 'nama_kegiatan', 'tanggal_pelaksanaan', 'deskripsi', 'PIC', 'status')
                                        ->with('kategori:id,nama_kategori');

        return DataTables::of($daftar_kegiatan)
            ->addIndexColumn()
            ->addColumn('kategori', function ($daftar_kegiatan) {
                return $daftar_kegiatan->kategori->nama_kategori ?? '-';
            })
            ->addColumn('aksi', function ($daftar_kegiatan) {
                $btn = '<a href="' . url('/daftar_kegiatan/' . $daftar_kegiatan->id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/daftar_kegiatan/' . $daftar_kegiatan->id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . 
                        url('/daftar_kegiatan/' . $daftar_kegiatan->id) . '">'
                        . csrf_field() . method_field('DELETE') . 
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
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

        $kategoriList = KategoriKegiatan::all();
        $activeMenu = 'daftar_kegiatan';

        return view('daftar_kegiatan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategoriList' => $kategoriList,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan data kegiatan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategori_kegiatan,id', 
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal_pelaksanaan' => 'required|date',
            'PIC' => 'required|string|max:100',
            'status' => 'required|in:complete,progres',
            'deskripsi' => 'nullable|string',
        ]);
    
        DaftarKegiatan::create([
            'id_kategori' => $request->id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'PIC' => $request->PIC,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect('daftar_kegiatan')->with('success', 'Data kegiatan berhasil disimpan');
    }
    



    // Menampilkan detail kegiatan
    public function show($id)
{
    // Mengambil kegiatan beserta relasi kategori
    $kegiatan = DaftarKegiatan::with('kategori')->find($id);

    // Jika kegiatan tidak ditemukan, redirect dengan pesan error
    if (!$kegiatan) {
        return redirect('/daftar_kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
    }

    // Menyiapkan breadcrumb
    $breadcrumb = (object) [
        'title' => 'Detail Kegiatan',
        'list' => ['Home', 'Kegiatan', 'Detail']
    ];

    // Menyiapkan informasi halaman
    $page = (object) [
        'title' => 'Detail Kegiatan'
    ];

    // Menu aktif untuk sidebar atau navigasi
    $activeMenu = 'kegiatan';

    // Mengembalikan view dengan data yang diperlukan
    return view('daftar_kegiatan.show', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'kegiatan' => $kegiatan,
        'activeMenu' => $activeMenu
    ]);
}


    // Menampilkan halaman form edit kegiatan
    // Controller DaftarKegiatanController.php

public function edit(string $id)
{
    $kegiatan = DaftarKegiatan::find($id);

    if (!$kegiatan) {
        return redirect('/daftar_kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
    }

    $breadcrumb = (object) [
        'title' => 'Edit Kegiatan',
        'list' => ['Home', 'Kegiatan', 'Edit']
    ];
    $page = (object) [
        'title' => 'Edit kegiatan'
    ];
    $kategoriList = KategoriKegiatan::all();
    $activeMenu = 'kegiatan';

    return view('daftar_kegiatan.edit', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'kegiatan' => $kegiatan,  // Ganti daftar_kegiatan menjadi kegiatan
        'kategoriList' => $kategoriList,
        'activeMenu' => $activeMenu
    ]);
}

public function update(Request $request, string $id)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori_kegiatan,id',  // Validasi ID kategori
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal_pelaksanaan' => 'required|date',
            'deskripsi' => 'nullable|string',
            'PIC' => 'required|string|max:100',
            'status' => 'required|in:complete,progres',  // Perbaiki pengecekan status
        ]);

        $kegiatan = DaftarKegiatan::with('kategori')->find($id);

        if (!$kegiatan) {
            return redirect('/daftar_kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
        }

        // Update data kegiatan dengan data dari form
        $kegiatan->update([
            'id_kategori' => $request->id_kategori,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'deskripsi' => $request->deskripsi,
            'PIC' => $request->PIC,
            'status' => $request->status
        ]);

        return redirect('/daftar_kegiatan')->with('success', 'Data kegiatan berhasil diubah');
    }

    // Menghapus data kegiatan
    public function destroy(string $id)
    {
        $kegiatan = DaftarKegiatan::find($id);

        if (!$kegiatan) {
            return redirect('/daftar_kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
        }

        try {
            $kegiatan->delete();
            return redirect('/daftar_kegiatan')->with('success', 'Data kegiatan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/daftar_kegiatan')->with('error', 'Data kegiatan gagal dihapus karena masih terkait dengan data lain');
        }
    }
}
