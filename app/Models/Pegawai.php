<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = [
        'jabatan_id',
        'nama',
        'nomor_telepon',
        'email',
        'alamat'
    ];
}
