<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $table = 'surat_keluar';

    protected $fillable = [
        'jabatan_id',
        'pegawai_id',
        'nomor',
        'tujuan',
        'perihal',
        'tanggal_kirim',
        'lampiran'
    ];

    protected $dates = [
        'tanggal_kirim'
    ];

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan');
    }
}
