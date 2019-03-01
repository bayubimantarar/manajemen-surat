<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pegawai;
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
            ->assertStatus(302);
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
            ->assertStatus(302);

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
            ->assertStatus(302);

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
            ->assertStatus(302);

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
    public function storeJabatanEmptyKode()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => NULL,
                'nama' => 'Kepala Dinas'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function storeJabatanEmptyNama()
    {
        # create pengguna data
        $pengguna = Factory(Pengguna::class)
            ->create();

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => NULL
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function storeJabatanKodeisExist()
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
            ->assertStatus(302);

        $checkJabatanData = $this
            ->assertDatabaseHas('jabatan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ]);

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function storeJabatanNamaisExist()
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
            ->assertStatus(302);

        $checkJabatanData = $this
            ->assertDatabaseHas('jabatan', [
                'kode' => 'KADIN',
                'nama' => 'Kepala Dinas'
            ]);

        $storeJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->post('/jabatan/simpan', [
                'kode' => 'SKR',
                'nama' => 'Kepala Dinas'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
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
            ->assertStatus(302);

        $updateJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->put('/jabatan/ubah/1', [
                'kode' => 'SKR',
                'nama' => 'Sekretaris'
            ])
            ->assertStatus(302);

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
            ->assertStatus(302);

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
            ->assertStatus(302);

        $delete = $this
            ->actingAs($pengguna, 'pengguna')
            ->delete('/jabatan/hapus/1')
            ->assertStatus(302);

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
            ->assertStatus(302);

        $delete = $this
            ->actingAs($pengguna, 'pengguna')
            ->delete('/jabatan/hapus/2')
            ->assertStatus(404);
    }

    /**
     * A basic feature test example.
     * @test
     * @group JabatanTest
     */
    public function pegawaiDeletedWhenJabatanDelete()
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
            ->assertStatus(302);

        $createPegawai = Factory(Pegawai::class)
            ->create();

        $deleteJabatan = $this
            ->actingAs($pengguna, 'pengguna')
            ->delete('/jabatan/hapus/1')
            ->assertStatus(302);

        $checkPegawaiData = $this
            ->assertDatabaseMissing('pegawai', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ]);
    }
}
