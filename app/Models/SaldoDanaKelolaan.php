<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoDanaKelolaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'kdbank',
        'no_rekening',
        'saldo_akhir',
    ];
}
