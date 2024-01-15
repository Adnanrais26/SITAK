<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kodeProduk',
        'obat',
        'kategoriObatId',
        'jenisObatId',
        'unitId',
        'jumlah',
        'keterangan',
        'active',
        'hargaBeli',
        'hargaJual',
    ];
}
