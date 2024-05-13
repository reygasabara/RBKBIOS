<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IktVisiteDiatas12 extends Model
{
    use HasFactory;

    protected $table = 'ikt_visite_diatas12s';

    protected $fillable = [
        'tgl_transaksi',
        'jumlah',
    ];
}
