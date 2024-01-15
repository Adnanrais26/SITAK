<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struk extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kodeStruk',
        'kodePenjualan',
        'total',
        'tunai',
        'userId',
        'created_at',
        'updated_at',
    ];
}
