<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IktVisitePertama extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'jumlah',
    ];
}
