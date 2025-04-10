<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman'; // Menentukan nama tabel yang benar

    protected $fillable = [
        'nama_penerima',
        'nama_instansi',
        'alamat_penerima',
        'no_tlp',
        'jenis_barang',
        'keterangan',
        'pic',
        'berat',
    ];
}