<?php

namespace Tests\Feature;

use Tests\TestCase;

class MatakuliahTest extends TestCase
{
    public function test_matakuliah_create_page_renders(): void
    {
        $response = $this->get('/matakuliah/create');

        $response->assertOk();
        $response->assertSee('Buat Mata Kuliah Baru');
    }

    public function test_matakuliah_index_page_renders(): void
    {
        $response = $this->get('/matakuliah');

        $response->assertOk();
        $response->assertSee('Daftar Mata Kuliah');
    }
}
