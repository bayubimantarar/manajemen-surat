<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'surat_masuk';

    protected $fillable = [
        'jabatan_id',
        'pegawai_id',
        'nomor',
        'asal',
        'perihal',
        'tanggal_terima',
        'lampiran'
    ];

    protected $dates = [
        'tanggal_terima'
    ];

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan');
    }
}
