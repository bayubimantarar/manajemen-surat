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
                    'email' => 'superadmin@example.com',
                    'password' => bcrypt('secret'),
                    'role' => 'Super Admin',
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ],
                [
                    'email' => 'sekretaris@example.com',
                    'password' => bcrypt('secret'),
                    'role' => 'Sekretaris',
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ]
            ]);
    }
}
