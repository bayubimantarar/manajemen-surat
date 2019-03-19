<?php

namespace Tests\Browser;

use Storage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Components\SuratMasukTanggalTerimaDatepicker as SuratMasukDatePicker;

class SuratMasukTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitSuratMasukUnauthenticated()
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
    public function visitSuratMasuk()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk')
                ->assertPathIs('/surat-masuk');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratMasuk()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk/form-tambah')
                ->assertPathIs('/surat-masuk/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('asal', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->select('pegawai_id', '1')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-terima')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-masuk');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratMasukEmptyAsal()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk/form-tambah')
                ->assertPathIs('/surat-masuk/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('asal', NULL)
                ->select('jabatan_id', '3')
                ->select('pegawai_id', '1')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-terima')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-masuk/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratMasukEmptyTujuanBagian()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk/form-tambah')
                ->assertPathIs('/surat-masuk/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('asal', 'Dinas Kependudukan')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-terima')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-masuk/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratMasukEmptyPerihal()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk/form-tambah')
                ->assertPathIs('/surat-masuk/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('asal', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->select('pegawai_id', '1')
                ->type('perihal', NULL)
                ->click('#tanggal-terima')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-masuk/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratMasukEmptyTanggalTerima()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk/form-tambah')
                ->assertPathIs('/surat-masuk/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('asal', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->select('pegawai_id', '1')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-masuk/form-tambah');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function createSuratMasukEmptyLampiran()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk/form-tambah')
                ->assertPathIs('/surat-masuk/form-tambah')
                ->type('nomor', 'III/III/MMIX')
                ->type('asal', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->select('pegawai_id', '1')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-terima')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->press('Simpan')
                ->assertPathIs('/surat-masuk');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function updateSuratMasukSameData()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk')
                ->assertPathIs('/surat-masuk')
                ->clickLink('Ubah')
                ->type('nomor', 'III/III/MMIX')
                ->type('asal', 'Dinas Kependudukan')
                ->select('jabatan_id', '3')
                ->select('pegawai_id', '1')
                ->type('perihal', 'Kegiatan Sensus Penduduk')
                ->click('#tanggal-terima')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-masuk');
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
                ->visit('/surat-masuk')
                ->assertPathIs('/surat-masuk')
                ->clickLink('Ubah')
                ->type('nomor', 'IV/III/MMIX')
                ->type('asal', 'Dinas Kebudayaan')
                ->select('jabatan_id', '3')
                ->select('pegawai_id', '1')
                ->type('perihal', 'Kegiatan Acara Musik Tradisional')
                ->click('#tanggal-terima')
                ->click('div.datepicker > div.datepicker-days > table.table-condensed > tbody > tr > td.today.day')
                ->attach('lampiran', public_path('disposisi.pdf'))
                ->press('Simpan')
                ->assertPathIs('/surat-masuk');
        });
    }

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function deleteSuratMasuk()
    {
        $pengguna = \App\Models\Pengguna::find(1);

        $this->browse(function (Browser $browser) use($pengguna) {
            $browser
                ->loginAs($pengguna, 'pengguna')
                ->visit('/surat-masuk')
                ->assertPathIs('/surat-masuk')
                ->clickLink('Hapus')
                ->assertPathIs('/surat-masuk');
        });
    }
}
