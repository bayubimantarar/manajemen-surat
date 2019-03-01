<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pengguna;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JabatanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function getJabatanUnauthenticated()
    {
        $getJabatan = $this
            ->get('/jabatan')
            ->assertRedirect('/autentikasi/form-login');
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function getJabatan()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $getJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->get('/jabatan')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function getFormCreateJabatan()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $getJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->get('/jabatan/form-tambah')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function getFormEditJabatan()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ])
            ->assertRedirect('/jabatan');

        $getEditJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->get('/jabatan/form-ubah/1')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function getFormEditJabatanDataNotExist()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ])
            ->assertRedirect('/jabatan');

        $getEditJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->get('/jabatan/form-ubah/2')
            ->assertStatus(404);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function storeJabatan()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ])
            ->assertRedirect('/jabatan');

        $checkJabatanData = $this
            ->assertDatabaseHas('jabatan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function updateJabatan()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ])
            ->assertRedirect('/jabatan');

        $updateJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->put('/jabatan/ubah/1', [
                'kode' => 'SKR',
                'nama' => 'Sekretaris'
            ])
            ->assertRedirect('/jabatan');

        $checkJabatanDataAfterUpdate = $this
            ->assertDatabaseHas('jabatan', [
                'kode' => 'SKR',
                'nama' => 'Sekretaris'
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function updateJabatanDataNotExist()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ])
            ->assertRedirect('/jabatan');

        $updateJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->put('/jabatan/ubah/2', [
                'kode' => 'SKR',
                'nama' => 'Sekretaris'
            ])
            ->assertStatus(404);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function deleteJabatan()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ])
            ->assertRedirect('/jabatan');

        $delete = $this
            ->actingAs($pengguna, 'pengguna')
            ->delete('/jabatan/hapus/1')
            ->assertRedirect('/jabatan');

        $checkJabatanDataAfterDelete = $this
            ->assertDatabaseMissing('jabatan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function deleteJabatanNotExist()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ])
            ->assertRedirect('/jabatan');

        $delete = $this
            ->actingAs($pengguna, 'pengguna')
            ->delete('/jabatan/hapus/2')
            ->assertStatus(404);
    }
}
