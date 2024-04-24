<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoPengelolaanKas extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'no_bilyet',
        'nilai_deposito',
        'nilai_bunga',
    ];
}
