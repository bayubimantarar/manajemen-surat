<?php

use Illuminate\Database\Seeder;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncateJabatan = DB::table('jabatan')
            ->truncate();

        $createJabatan = DB::table('jabatan')
            ->insert([
                [
                    'kode' => 'KADIN',
                    'nama' => 'Kepala Dinas'
                ],
                [
                    'kode' => 'SKR',
                    'nama' => 'Sekretaris'
                ]
            ]);
    }
}
