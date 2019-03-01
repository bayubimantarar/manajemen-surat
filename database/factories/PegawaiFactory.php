<?php

use App\Models\Pegawai;
use Faker\Generator as Faker;

$factory->define(Pegawai::class, function (Faker $faker) {
    return [
        'jabatan_id' => 1,
        'nama' => 'Bayu Bimantara',
        'nomor_telepon' => '0895332055486',
        'email' => 'bayubimantarar@gmail.com',
        'alamat' => 'Kota Baru Parahyangan Tatar Wangsakerta A1 No 77'
    ];
});
