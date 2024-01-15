<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokOpname extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'userId',
        'obatId',
        'unitId',
        'kodeProduk',
        'jumlahTercatat',
        'jumlahSebenarnya',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
