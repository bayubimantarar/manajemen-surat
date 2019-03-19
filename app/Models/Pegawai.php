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
        'alamat',
        'password'
    ];

    static function orderByCreatedAtDesc()
    {
        $pegawai = Pegawai::orderBy('created_at', 'desc');

        return $pegawai;
    }
}
