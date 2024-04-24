<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPengiriman extends Model
{
    use HasFactory;

    protected $table = 'status_pengiriman';

    protected $guarded = [
        'modul',
        'jenis_data',
        'jadwal_pengiriman',
        'status',
        'pengiriman_selanjutnya'
    ];
}
