<?php

use Illuminate\Database\Seeder;

class PenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truncatePengguna = DB::table('pengguna')
            ->truncate();

        $createPengguna = DB::table('pengguna')
            ->insert([
                [
                    'email' => 'bayubimantarar@gmail.com',
                    'password' => bcrypt('secret'),
                    'role' => 'Super Admin'
                ],
                [
                    'email' => 'restiwulandari@gmail.com',
                    'password' => bcrypt('secret'),
                    'role' => 'Sekretaris'
                ]
            ]);
    }
}
