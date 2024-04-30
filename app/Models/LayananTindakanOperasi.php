<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananTindakanOperasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'klasifikasi_operasi',
        'jumlah',
    ];
}
