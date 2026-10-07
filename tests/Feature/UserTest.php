<?php

namespace Tests\Feature;

use App\Models\Kelas;
use App\Models\UserModel;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user_edit_page_renders(): void
    {
        $kelas = Kelas::create(['nama_kelas' => 'A']);
        $user = UserModel::create([
            'name' => 'Budi',
            'nim' => '2024001',
            'kelas_id' => $kelas->id,
        ]);

        $response = $this->get('/user/' . $user->id . '/edit');

        $response->assertOk();
        $response->assertSee('Edit Pengguna');
    }
}
