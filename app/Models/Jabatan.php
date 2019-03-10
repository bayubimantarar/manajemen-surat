<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = [
        'kode',
        'nama',
        'posisi'
    ];

    static function orderByCreatedAtDesc()
    {
        $jabatan = Jabatan::orderBy('created_at', 'desc');

        return $jabatan;
    }
}
