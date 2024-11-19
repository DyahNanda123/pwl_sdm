<?php
namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;

class DaftarkegiatanController extends Controller
{
    public function index()
    {
        $activeMenu = 'daftar_kegiatan';
        $breadcrumb = (object)[
            'title' => 'Data Kegiatan',
            'list'  => ['Home', 'Kegiatan']
        ];
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        return view('daftar_kegiatan.index', [
            'activeMenu'  => $activeMenu,
            'breadcrumb'  => $breadcrumb,
            'kategori'    => $kategori
        ]);
    }

    public function list(Request $request)
    {
        $daftar_kegiatan = KegiatanModel::select('kategori_id', 'kegiatan_id', 'kegiatan_nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'status', 'jenis_kegiatan')
            ->with('kategori');

        $kategori_id = $request->input('filter_kategori');
        if (!empty($kategori_id)) {
            $daftar_kegiatan->where('kategori_id', $kategori_id);
        }
    }
}