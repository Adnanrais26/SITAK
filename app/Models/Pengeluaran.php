<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'pengeluaran',
        'jenisPengeluaranId',
        'distributor',
        'file',
        'jumlah',
        'keterangan',
        'tanggalPengeluaran',
        'created_at',
    ];
}
