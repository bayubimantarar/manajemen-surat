<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PenggunaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function visitPenggunaUnauthenticated()
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
    public function visitPengguna()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna')
                ->assertPathIs('/pengguna');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function createPengguna()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna/form-tambah')
                ->assertPathIs('/pengguna/form-tambah')
                ->type('email', 'johndoe@example.com')
                ->select('role', 'Super Admin')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Simpan')
                ->assertPathIs('/pengguna')
                ->assertSee('Data berhasil disimpan!');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function createPenggunaEmptyEmail()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna/form-tambah')
                ->assertPathIs('/pengguna/form-tambah')
                ->type('email', NULL)
                ->select('role', 'Super Admin')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Simpan')
                ->assertPathIs('/pengguna/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function createPenggunaEmailIsExist()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna/form-tambah')
                ->assertPathIs('/pengguna/form-tambah')
                ->type('email', 'johndoe@example.com')
                ->select('role', 'Super Admin')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Simpan')
                ->assertPathIs('/pengguna/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function createPenggunaEmptyPassword()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna/form-tambah')
                ->assertPathIs('/pengguna/form-tambah')
                ->type('email', 'johndoe@example.com')
                ->select('role', 'Super Admin')
                ->type('password', NULL)
                ->type('password_confirmation', NULL)
                ->press('Simpan')
                ->assertPathIs('/pengguna/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function createPenggunaEmptyPasswordConfirmation()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna/form-tambah')
                ->assertPathIs('/pengguna/form-tambah')
                ->type('email', 'johndoe@example.com')
                ->select('role', 'Super Admin')
                ->type('password', 'secret')
                ->type('password_confirmation', NULL)
                ->press('Simpan')
                ->assertPathIs('/pengguna/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function createPenggunaPasswordConfirmationNotSame()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna/form-tambah')
                ->assertPathIs('/pengguna/form-tambah')
                ->type('email', 'johndoe@example.com')
                ->select('role', 'Super Admin')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secretz')
                ->press('Simpan')
                ->assertPathIs('/pengguna/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function updatePenggunaSameData()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna')
                ->clickLink('Ubah')
                ->type('email', 'johndoe@example.com')
                ->select('role', 'Super Admin')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Simpan')
                ->assertPathIs('/pengguna');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function updatePengguna()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna')
                ->clickLink('Ubah')
                ->type('email', 'janedoe@example.com')
                ->select('role', 'Sekretaris')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Simpan')
                ->assertPathIs('/pengguna');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @group penggunaTest
     * @return void
     */
    public function deletePengguna()
    {
        # find pengguna as super admin
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/pengguna')
                ->clickLink('Hapus')
                ->assertPathIs('/pengguna');
        });
    }
}
