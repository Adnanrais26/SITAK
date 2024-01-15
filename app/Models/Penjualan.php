<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kodeProduk',
        'namaPembeli',
        'noTelp',
        'jumlah',
        'hargaJual',
        'hargaBeli',
        'statusPembayaran',
        'unitId',
        'obatId',
        'total',
        'totalBeli',
        'kodePenjualan'
    ];
}
