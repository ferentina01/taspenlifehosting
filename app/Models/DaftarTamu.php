<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DaftarTamu extends Model
{
    use HasFactory;

    // Menentukan atribut yang dapat diisi secara massal
    protected $fillable = [
        'tanggal',
        'nama_tamu',
        'instansi',
        'pic',
        'keterangan',
        'jam_kedatangan',
    ];
}
