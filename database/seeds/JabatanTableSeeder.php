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
                    'nama' => 'Kepala Dinas',
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ],
                [
                    'kode' => 'SKR',
                    'nama' => 'Sekretaris',
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ]
            ]);
    }
}
