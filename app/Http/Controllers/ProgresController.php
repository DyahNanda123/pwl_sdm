<?php

namespace App\Http\Controllers;

use App\Models\ProgresModel;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProgresController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Progres',
            'list' => ['Home', 'Progres']
        ];

        $page = (object) [
            'title' => 'Daftar progres kegiatan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'progres';

        return view('progres.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Fetch progress data in JSON format for DataTables
    public function list(Request $request)
    {
    }

    // Show the form for creating a new progress record
    public function create()
    {
        $kegiatan = KegiatanModel::all();
        return view('progres.create', compact('kegiatan'));
    }

    // Store a newly created progress record in storage
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kegiatan_id' => 'required|exists:kegiatan,kegiatan_id',
            'nip' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ProgresModel::create($request->all());

        return redirect()->route('progres.index')->with('success', 'Progres berhasil ditambahkan.');
    }

    // Show the form for editing the specified progress record
    public function edit($id)
    {
        $progres = ProgresModel::findOrFail($id);
        $kegiatan = KegiatanModel::all();
        return view('progres.edit', compact('progres', 'kegiatan'));
    }

    // Update the specified progress record in storage
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kegiatan_id' => 'required|exists:kegiatan,kegiatan_id',
            'nip' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $progres = ProgresModel::findOrFail($id);
        $progres->update($request->all());

        return redirect()->route('progres.index')->with('success', 'Progres berhasil diperbarui.');
    }

    // Remove the specified progress record from storage
    public function destroy($id)
    {

    }
}
