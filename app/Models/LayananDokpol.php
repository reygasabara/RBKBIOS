<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananDokpol extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi',
        'kedokteran_forensik',
        'psikiatri_forensik',
        'sentra_visum_dan_medikolegal',
        'ppat',
        'odontologi_forensik',
        'psikologi_forensik',
        'antropologi_forensik',
        'olah_tkp_medis',
        'kesehatan_tahanan',
        'narkoba',
        'toksikologi_medik',
        'pelayanan_dna',
        'pam_keslap_food_security',
        'dvi',
    ];
}
