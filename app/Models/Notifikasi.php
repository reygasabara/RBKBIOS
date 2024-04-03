<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $guarded = [
        'tgl_transaksi',
        'submenu',
        'keunikan',
        'pesan',
    ];
}
