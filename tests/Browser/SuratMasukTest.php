<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SuratMasukTest extends DuskTestCase
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
                ->visit('/surat-masuk')
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

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk')
                ->assertPathIs('/surat-masuk');
        });
    }
}
