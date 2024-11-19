<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];
        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'NIP', 'nama', 'email', 'role')
            ->get();
        
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/user/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    // Menampilkan halaman form tambah user
    public function create()
{
    $breadcrumb = (object) [
        'title' => 'Tambah User',
        'list' => ['Home', 'User', 'Tambah']
    ];
    $page = (object) [
        'title' => 'Tambah user baru'
    ];

    $activeMenu = 'user'; // set menu yang sedang aktif
    $Level = LevelModel::all(); // Mengambil data level
    return view('user.create', compact('breadcrumb', 'page', 'Level', 'activeMenu'));
}

// Menyimpan data user baru
public function store(Request $request)
{
    $request->validate([
        'NIP'      => 'required|string|min:3|unique:user,NIP',
        'nama'     => 'required|string|max:100',
        'email'    => 'required|email|unique:user,email',
        'password' => 'required|min:5',
        'role'     => 'required|string' // Validasi role sesuai kolom di database
    ]);

    UserModel::create([
        'NIP'      => $request->NIP,
        'nama'     => $request->nama,
        'email'    => $request->email,
        'password' => bcrypt($request->password), // Enkripsi password
        'role'     => $request->role // Simpan role dari input form
    ]);

    return redirect('/user')->with('success', 'Data user berhasil disimpan');
}



    // Menampilkan detail user
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail user'
        ];
        $activeMenu = 'user';
        $Level = LevelModel::all();
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'Level' => $Level, 'activeMenu' => $activeMenu]);
    }

    // Menampilkan halaman untuk edit user
    public function edit(string $user_id)
    {
        $user = UserModel::find($user_id);

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit user'
        ];
        $Level = LevelModel::all();
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'Level' => $Level, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            'NIP'      => 'required|string|min:3|unique:user,NIP,' . $id . ',user_id',
            'nama'     => 'required|string|max:100',
            'email'    => 'required|email|unique:user,email,' . $id . ',user_id',
            'password' => 'nullable|min:5',
            'level'     => 'required|string|max:50'
        ]);

        $user = UserModel::with('level')->find($id);

        $user->update([
            'NIP'      => $request->NIP,
            'nama'     => $request->nama,
            'email'    => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'level'     => $request->level
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    // Menghapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
