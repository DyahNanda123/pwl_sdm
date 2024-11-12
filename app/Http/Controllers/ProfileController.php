<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;

class ProfileController extends Controller
{
    /*public function index()
    {
        $id = session('user_id');
        $breadcrumb = (object) [
            'title' => 'Profile',
            'list' => ['Home', 'profile']
        ];
        $page = (object) [
            'title' => 'Profile Anda'
        ];
        $activeMenu = 'profile'; // set menu yang sedang aktif
        $user = UserModel::with('level')->find($id);
        $level = LevelModel::all(); // ambil data level untuk filter level
        return view('profile.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'user' => $user,'activeMenu' => $activeMenu]);
    }*/
}