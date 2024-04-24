<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdmDokterSpesialis extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'pns',
        'pppk',
        'anggota',
        'non_pns_tetap',
        'kontrak',
    ];
}
