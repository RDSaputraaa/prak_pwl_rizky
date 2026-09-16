<?php

namespace App\Http\controllers;

use illuminate\Http\Request;

class ProfileController extends Controller
{

    public function profile($nama = "", $NPM = "", $kelas = "")
    {
        $data = [
            'nama' => $nama,
            'NPM' => $NPM,
            'kelas' => $kelas
        ];
        return view('profile', $data);
    }
}