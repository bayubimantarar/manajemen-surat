<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JabatanTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitJabatanUnauthenticated()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/jabatan')
                ->assertPathIs('/autentikasi/form-login');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitJabatan()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan')
                ->assertPathIs('/jabatan');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createJabatan()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan/form-tambah')
                ->type('kode', 'STF')
                ->type('nama', 'Staff')
                ->press('Simpan')
                ->assertPathIs('/jabatan');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createJabatanEmptyKode()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan/form-tambah')
                ->type('kode', NULL)
                ->type('nama', 'Staff')
                ->press('Simpan')
                ->assertPathIs('/jabatan/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createJabatanEmptyNama()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan/form-tambah')
                ->type('kode', 'STF')
                ->type('nama', NULL)
                ->assertPathIs('/jabatan/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createJabatanKodeIsExist()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan/form-tambah')
                ->type('kode', 'STF')
                ->type('nama', 'Staff')
                ->assertPathIs('/jabatan/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createJabatanNamaIsExist()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan/form-tambah')
                ->type('kode', 'STF')
                ->type('nama', 'Staff')
                ->assertPathIs('/jabatan/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function updateJabatanSameData()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan')
                ->clickLink('Ubah')
                ->type('kode', 'STF')
                ->type('nama', 'Staff')
                ->press('Simpan')
                ->assertPathIs('/jabatan');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function updadateJabatan()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan')
                ->clickLink('Ubah')
                ->type('kode', 'SPV')
                ->type('nama', 'Supervisor')
                ->press('Simpan')
                ->assertPathIs('/jabatan');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function deleteJabatan()
    {
        # find super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/jabatan')
                ->clickLink('Hapus')
                ->assertPathIs('/jabatan');
        });
    }
}
