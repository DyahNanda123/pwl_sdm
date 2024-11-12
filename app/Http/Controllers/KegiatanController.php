<?php
namespace App\Http\Controllers;

use App\Models\kegiatanModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;

class KegiatanController extends Controller
{
    public function index()
    {
        $activeMenu = 'kegiatan';
        $breadcrumb = (object)[
            'title' => 'Data kegiatan',
            'list'  => ['Home', 'kegiatan']
        ];
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        return view('kegiatan.index', [
            'activeMenu'  => $activeMenu,
            'breadcrumb'  => $breadcrumb,
            'kategori'    => $kategori
        ]);
    }

    public function list(Request $request)
    {
        $kegiatan = KegiatanModel::select('kategori_id','kegiatan_kode','kegiatan_nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'status', 'jenis_kegiatan', 'kategori_id')
                             ->with('kategori');

        $kategori_id = $request->input('filter_kategori');
        if (!empty($kategori_id)) {
            $kegiatan->where('kategori_id', $kategori_id);
        }

    }
}