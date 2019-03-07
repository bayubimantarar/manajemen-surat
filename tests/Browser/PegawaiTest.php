<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PegawaiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitPegawaiUnauthenticated()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/pegawai')
                ->assertPathIs('/autentikasi/form-login');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitPegawai()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai')
                ->assertPathIs('/pegawai');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createPegawai()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai/form-tambah')
                ->assertPathIs('/pegawai/form-tambah')
                ->select('jabatan_id', 'Kepala Dinas')
                ->type('nama', 'John Doe')
                ->type('nomor_telepon', '0821')
                ->type('email', 'johndoe@mail.com')
                ->type('alamat', 'Jl. Panghegar Utara No. 18')
                ->press('Simpan')
                ->assertPathIs('/pegawai')
                ->assertSee('Data berhasil disimpan!');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createPegawaiEmptyNama()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai/form-tambah')
                ->assertPathIs('/pegawai/form-tambah')
                ->select('jabatan_id', 'Kepala Dinas')
                ->type('nama', NULL)
                ->type('nomor_telepon', '0821')
                ->type('email', 'johndoe@mail.com')
                ->type('alamat', 'Jl. Panghegar Utara No. 18')
                ->press('Simpan')
                ->assertPathIs('/pegawai/form-tambah')
                ->assertSee('Nama perlu diisi!');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createPegawaiEmptyNomorTelepon()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai/form-tambah')
                ->assertPathIs('/pegawai/form-tambah')
                ->select('jabatan_id', 'Kepala Dinas')
                ->type('nama', 'John Doe')
                ->type('nomor_telepon', NULL)
                ->type('email', 'johndoe@mail.com')
                ->type('alamat', 'Jl. Panghegar Utara No. 18')
                ->press('Simpan')
                ->assertPathIs('/pegawai/form-tambah')
                ->assertSee('Nomor telepon perlu diisi!');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createPegawaiEmptyEmail()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai/form-tambah')
                ->assertPathIs('/pegawai/form-tambah')
                ->select('jabatan_id', 'Kepala Dinas')
                ->type('nama', 'John Doe')
                ->type('nomor_telepon', '0821')
                ->type('email', NULL)
                ->type('alamat', 'Jl. Panghegar Utara No. 18')
                ->press('Simpan')
                ->assertPathIs('/pegawai/form-tambah')
                ->assertSee('Email perlu diisi!');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createPegawaiEmailFormatInvalid()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai/form-tambah')
                ->assertPathIs('/pegawai/form-tambah')
                ->select('jabatan_id', 'Kepala Dinas')
                ->type('nama', 'John Doe')
                ->type('nomor_telepon', '0821')
                ->type('email', 'johndoe')
                ->type('alamat', 'Jl. Panghegar Utara No. 18')
                ->press('Simpan')
                ->assertPathIs('/pegawai/form-tambah')
                ->assertSee('Format email tidak sesuai!');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createPegawaiEmailIsExist()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai/form-tambah')
                ->assertPathIs('/pegawai/form-tambah')
                ->select('jabatan_id', 'Kepala Dinas')
                ->type('nama', 'John Doe')
                ->type('nomor_telepon', '0821')
                ->type('email', 'johndoe@mail.com')
                ->type('alamat', 'Jl. Panghegar Utara No. 18')
                ->press('Simpan')
                ->assertPathIs('/pegawai/form-tambah')
                ->assertSee('Email sudah ada!');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createPegawaiEmptyAlamat()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai/form-tambah')
                ->assertPathIs('/pegawai/form-tambah')
                ->select('jabatan_id', 'Kepala Dinas')
                ->type('nama', 'John Doe')
                ->type('nomor_telepon', '0821')
                ->type('email', 'johndoe@mail.com')
                ->type('alamat', NULL)
                ->press('Simpan')
                ->assertPathIs('/pegawai/form-tambah')
                ->assertSee('Alamat perlu diisi!');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function updatePegawaiSameData()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai')
                ->assertPathIs('/pegawai')
                ->clickLink('Ubah')
                ->select('jabatan_id', 'Kepala Dinas')
                ->type('nama', 'John Doe')
                ->type('nomor_telepon', '0821')
                ->type('email', 'johndoe@mail.com')
                ->type('alamat', 'Jl. Panghegar Utara No. 18')
                ->press('Simpan')
                ->assertPathIs('/pegawai');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function updatePegawai()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai')
                ->assertPathIs('/pegawai')
                ->clickLink('Ubah')
                ->select('jabatan_id', 'Sekretaris')
                ->type('nama', 'Jane Doe')
                ->type('nomor_telepon', '0822')
                ->type('email', 'janedoe@mail.com')
                ->type('alamat', 'Jl. Sawah Badag')
                ->press('Simpan')
                ->assertPathIs('/pegawai');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function deletePegawai()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pegawai')
                ->clickLink('Hapus')
                ->assertPathIs('/pegawai')
                ->assertSee('Data berhasil dihapus!');
        });
    }
}
