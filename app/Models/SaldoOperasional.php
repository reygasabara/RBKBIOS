<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoOperasional extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'kdbank',
        'no_rekening',
        'unit',
        'saldo_akhir',
    ];
}
