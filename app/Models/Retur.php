<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'obatId',
        'kodeProduk',
        'jumlah',
        'unitId',
        'distributor',
        'keterangan',
        'status',
        'created_at',
    ];

}
