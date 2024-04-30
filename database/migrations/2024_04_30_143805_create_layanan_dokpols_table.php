<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('layanan_dokpols', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->integer('kedokteran_forensik');
            $table->integer('psikiatri_forensik');
            $table->integer('sentra_visum_dan_medikolegal');
            $table->integer('ppat');
            $table->integer('odontologi_forensik');
            $table->integer('psikologi_forensik');
            $table->integer('antropologi_forensik');
            $table->integer('olah_tkp_medis');
            $table->integer('kesehatan_tahanan');
            $table->integer('narkoba');
            $table->integer('toksikologi_medik');
            $table->integer('pelayanan_dna');
            $table->integer('pam_keslap_food_security');
            $table->integer('dvi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_dokpols');
    }
};
