<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SuratKeluarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitSuratkeluarUnauthenticated()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/surat-keluar')
                ->assertPathIs('/autentikasi/form-login');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitSuratKeluar()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar')
                ->assertPathIs('/surat-keluar');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratKeluar()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar/form-tambah')
                ->assertPathIs('/surat-keluar/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('tujuan', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-kirim')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-keluar');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratKeluarEmptyTujuan()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar/form-tambah')
                ->assertPathIs('/surat-keluar/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('tujuan', NULL)
                ->select('jabatan_id', '3')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-kirim')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-keluar/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratKeluarEmptyAsalBagian()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar/form-tambah')
                ->assertPathIs('/surat-keluar/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('tujuan', 'Dinas Kependudukan')
                ->select('jabatan_id', NULL)
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-kirim')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-keluar/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratKeluarEmptyPerihal()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar/form-tambah')
                ->assertPathIs('/surat-keluar/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('tujuan', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->type('perihal', NULL)
                ->click('#tanggal-kirim')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-keluar/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratKeluarEmptyTanggalKirim()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar/form-tambah')
                ->assertPathIs('/surat-keluar/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('tujuan', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-keluar/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratKeluarEmptyLampiran()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar/form-tambah')
                ->assertPathIs('/surat-keluar/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('tujuan', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-kirim')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->press('Simpan')
                ->assertPathIs('/surat-keluar');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function updateSuratKeluarSameData()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar')
                ->assertPathIs('/surat-keluar')
                ->clickLink('Ubah')
                ->type('nomor', 'III/III/MMIX')
                ->type('tujuan', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-kirim')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-keluar');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function updateSuratMasuk()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar')
                ->assertPathIs('/surat-keluar')
                ->clickLink('Ubah')
                ->type('nomor', 'IV/III/MMIX')
                ->type('tujuan', 'Dinas Kebudayaan')
                ->select('jabatan_id', '3')
                ->type('perihal', 'Kegiatan Acara Musik Tradisional')
                ->click('#tanggal-kirim')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-keluar');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function deleteSuratKeluar()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-keluar')
                ->assertPathIs('/surat-keluar')
                ->clickLink('Hapus')
                ->assertPathIs('/surat-keluar');
        });
    }
}
