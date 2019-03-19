<?php

use Illuminate\Database\Seeder;

class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawaiTruncate = DB::table('pegawai')
            ->truncate();

        $pegawaiCreate = DB::table('pegawai')
            ->insert([
                'jabatan_id' => 3,
                'nama' => 'Bayu Bimantara',
                'nomor_telepon' => '0895332055486',
                'email' => 'bayubimantarar@gmail.com',
                'alamat' => 'Tatar Papandayan A1 No 17 Kota Baru Parahyangan',
                'password' => bcrypt('secret')
            ]);
    }
}
