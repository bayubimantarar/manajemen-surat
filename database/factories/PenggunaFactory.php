<?php

use App\Models\Pengguna;
use Faker\Generator as Faker;

$factory->define(Pengguna::class, function (Faker $faker) {
    return [
        'email' => 'bayubimantarar@gmail.com',
        'password' => bcrypt('secret')
    ];
});
