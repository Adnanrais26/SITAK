<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kodePenjualan',
        'namaPembeli',
        'noTelp',
        'fileResep',
        'created_at',
        'updated_at',
    ];
}
