<?php

namespace App\Http\Controllers;

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