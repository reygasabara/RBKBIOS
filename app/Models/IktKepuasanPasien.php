<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IktKepuasanPasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'nilai',
    ];
}
