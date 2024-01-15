<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianObat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'pembelianObat',
        'jenisPembelianId',
        'distributor',
        'file',
        'jumlah',
        'keterangan',
        'tanggalPembelian',
        'created_at',
    ];
}
