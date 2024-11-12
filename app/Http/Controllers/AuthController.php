<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home 
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            // Buat kredensial statis untuk testing
            $credentials = [
                'username' => 'testuser',
                'password' => 'password123'
            ];

            // Validasi dengan kredensial statis
            if ($request->username === $credentials['username'] && $request->password === $credentials['password']) {
                // Simulasi sesi pengguna setelah login
                session([
                    'user_id' => 1 // ID pengguna statis
                ]);
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
        return redirect('login');
    }

    public function register()
    {
        // Simulasi data level tanpa terhubung ke database
        $level = [
            ['level_id' => 1, 'level_nama' => 'Admin'],
            ['level_id' => 2, 'level_nama' => 'User']
        ];

        return view('auth.register')->with('level', $level);
    }

    public function store(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id'  => 'required|integer',
                'username'  => 'required|string|min:3',
                'nama'      => 'required|string|max:100',
                'password'  => 'required|min:6'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Validasi Gagal',
                    'msgField'  => $validator->errors(),
                ]);
            }

            // Tidak menyimpan data ke database, hanya merespons seolah-olah data berhasil disimpan
            return response()->json([
                'status'    => true,
                'message'   => 'Data user berhasil disimpan',
                'redirect' => url('login')
            ]);
        }
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
