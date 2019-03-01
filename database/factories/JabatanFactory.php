<?php

use App\Models\Jabatan;
use Faker\Generator as Faker;

$factory->define(Jabatan::class, function (Faker $faker) {
    return [
        'kode' => 'KADIN',
        'nama' => 'Kepala Dinas'
    ];
});
