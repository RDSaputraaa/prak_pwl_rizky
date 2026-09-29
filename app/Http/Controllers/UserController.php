<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\Kelas;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'npm' => ['required', 'string', 'max:255'],
            'kelas_id' => ['required', 'exists:kelas,id'],
        ]);

        $this->userModel->create([
            'name' => $validated['nama'],
            'nim' => $validated['npm'],
            'kelas_id' => $validated['kelas_id'],
        ]);

        return redirect()->route('users.index')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function create()
    {
        return view('create_user', [
            'title' => 'Tambah Pengguna',
            'kelas' => $this->kelasModel->getKelas(),
        ]);
    }

    public function destroy(int $id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengguna',
            'users' => $this->userModel->getUser()
        ];

        return view('list_user', $data);
    }
}
