<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailKegiatanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Detail Kegiatan',
            'list' => ['Home', 'Detail Kegiatan']
        ];

        $page = (object) [
            'title' => 'Daftar detail kegiatan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'detailkegiatan';

        return view('detailkegiatan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
}
