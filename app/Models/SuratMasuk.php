<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';
    protected $fillable = [
        'jabatan_id',
        'pengguna_id',
        'nomor',
        'asal',
        'perihal',
        'tanggal_terima',
        'lampiran'
    ];
}
