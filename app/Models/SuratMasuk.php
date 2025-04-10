<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'perihal',
        'kurir',
        'up',
        'tanggal_masuk',
        'keterangan', // Pastikan ini sesuai dengan nama kolom di database
    ];
}
