<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitDashboardUnauthenticated()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->assertPathIs('/autentikasi/form-login');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitDashboardAuthenticatedAsSuperAdmin()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use ($pengguna){
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/')
                ->assertPathIs('/');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitDashboardAuthenticatedAsSekretaris()
    {
        $pengguna = \App\Models\Pengguna::find(2);

        $this->browse(function (Browser $browser) use ($pengguna){
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/')
                ->assertPathIs('/');
        });
    }
}
