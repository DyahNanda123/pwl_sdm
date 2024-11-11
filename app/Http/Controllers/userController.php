<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        // $data = [
        //     'NIP' => '1122334455', // Menambahkan NIP sesuai struktur baru
        //     'nama' => 'Pelanggan',
        //     'email' => 'pelanggan@example.com', // Menambahkan email
        //     'password' => Hash::make('12345'),
        //     'role' => 3 // Mengganti level_id dengan role
        // ];
        // userModel::insert($data);

        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        userModel::where('NIP', '1122334455')->update($data); // Mengganti 'username' dengan 'NIP'        

        $user = userModel::all();
        return view('user', ['data' => $user]);
    }
    public function tambah(){
            return view('user_tambah');
        }
    
        public function tambah_simpan(Request $request) {
            userModel::create([
                'NIP' => $request->NIP,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Perbaikan: menambahkan tanda '$' yang hilang di Hash::make
                'role' => $request->role
            ]);
        
            return redirect('/user');
        }

        public function ubah($id) {
            $user = UserModel::find($id);
            return view('user_ubah', ['data' => $user]);
        }
        
        public function ubah_simpan($id, Request $request) {
            $user = UserModel::find($id);
        
            // Update data user dengan data yang baru
            $user->NIP = $request->NIP;
            $user->nama = $request->nama;
            $user->email = $request->email;
        
            // Jika password diisi, maka hash password tersebut, jika tidak biarkan tetap
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
        
            $user->role = $request->role;
        
            // Simpan perubahan
            $user->save();
        
            return redirect('/user');
        }

        public function hapus($id){
        $user = userModel::find($id);
        $user->delete();
        return redirect('/user');
        }
        
}