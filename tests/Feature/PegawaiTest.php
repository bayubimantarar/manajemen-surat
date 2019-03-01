<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Jabatan;
use App\Models\Pengguna;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PegawaiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function getPegawaiUnauthenticated()
    {
        $getPegawai = $this
            ->get('/pegawai')
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function getPegawai()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();

        $getPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->get('/pegawai')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function getFormCreatePegawai()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();

        $getPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->get('/pegawai/form-tambah')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function storePegawai()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $checkPegawaiData = $this
            ->assertDatabaseHas('pegawai', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function storePegawaiEmptyJabatanID()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => NULL,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function storePegawaiEmptyNama()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => NULL,
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function storePegawaiEmptyNomorTelepon()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => NULL,
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function storePegawaiEmptyEmail()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => NULL,
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function storePegawaiEmptyAlamat()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => NULL
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function storePegawaiEmailisExist()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function getFormEditPegawai()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->get('/pegawai/form-ubah/1')
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function getFormEditPegawaiDataNotExist()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->get('/pegawai/form-ubah/1')
            ->assertStatus(404);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function updatePegawai()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->put('/pegawai/ubah/1', [
                'jabatan_id' => 1,
                'nama' => 'Arya Bintang Bismaka',
                'nomor_telepon' => '089673372429',
                'email' => 'aryabintangbismaka@gmail.com',
                'alamat' => 'Kampung Cidahu'
            ])
            ->assertStatus(302);

        $checkPegawaiDataAfterUpdate = $this
            ->assertDatabaseHas('pegawai', [
                'jabatan_id' => 1,
                'nama' => 'Arya Bintang Bismaka',
                'nomor_telepon' => '089673372429',
                'email' => 'aryabintangbismaka@gmail.com',
                'alamat' => 'Kampung Cidahu'
            ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function updatePegawaiEmptyJabatanID()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->put('/pegawai/ubah/1', [
                'jabatan_id' => NULL,
                'nama' => 'Arya Bintang Bismaka',
                'nomor_telepon' => '089673372429',
                'email' => 'aryabintangbismaka@gmail.com',
                'alamat' => 'Kampung Cidahu'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function updatePegawaiEmptyNama()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->put('/pegawai/ubah/1', [
                'jabatan_id' => 1,
                'nama' => NULL,
                'nomor_telepon' => '089673372429',
                'email' => 'aryabintangbismaka@gmail.com',
                'alamat' => 'Kampung Cidahu'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function updatePegawaiEmptyNomorTelepon()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->put('/pegawai/ubah/1', [
                'jabatan_id' => 1,
                'nama' => 'Arya Bintang Bismaka',
                'nomor_telepon' => NULL,
                'email' => 'aryabintangbismaka@gmail.com',
                'alamat' => 'Kampung Cidahu'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function updatePegawaiEmptyEmail()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->put('/pegawai/ubah/1', [
                'jabatan_id' => 1,
                'nama' => 'Arya Bintang Bismaka',
                'nomor_telepon' => '089673372429',
                'email' => NULL,
                'alamat' => 'Kampung Cidahu'
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function updatePegawaiEmptyAlamat()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->put('/pegawai/ubah/1', [
                'jabatan_id' => NULL,
                'nama' => 'Arya Bintang Bismaka',
                'nomor_telepon' => '089673372429',
                'email' => 'aryabintangbismaka@gmail.com',
                'alamat' => NULL
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }

    /**
     * A basic feature test example.
     * @test
     * @group PegawaiTest
     */
    public function updatePegawaiEmailisExists()
    {
        $createPengguna = Factory(Pengguna::class)
            ->create();
        $createJabatan = Factory(Jabatan::class)
            ->create();

        $storePegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->post('/pegawai/simpan', [
                'jabatan_id' => 1,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
            ])
            ->assertStatus(302);

        $editPegawai = $this
            ->actingAs($createPengguna, 'pengguna')
            ->put('/pegawai/ubah/1', [
                'jabatan_id' => NULL,
                'nama' => 'Arya Bintang Bismaka',
                'nomor_telepon' => '089673372429',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => NULL
            ])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }
}
