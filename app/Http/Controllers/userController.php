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
}