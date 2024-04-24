<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPengirimanData extends Model
{
    use HasFactory;

    protected $guarded = [
        'waktu_pengiriman',
        'modul',
        'jenis_data',
        'tgl_transaksi',
        'kata_kunci',
        'status',
        'pesan',
        'eror',
    ];
}
