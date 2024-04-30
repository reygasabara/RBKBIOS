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
        Schema::create('layanan_pasien_b_p_j_s_non_b_p_j_s', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->integer('jumlah_bpjs');
            $table->integer('jumlah_non_bpjs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_pasien_b_p_j_s_non_b_p_j_s');
    }
};
