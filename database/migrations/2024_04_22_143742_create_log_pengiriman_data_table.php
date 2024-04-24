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
        Schema::create('log_pengiriman_data', function (Blueprint $table) {
            $table->id();
            $table->datetime('waktu_pengiriman');
            $table->string('modul');
            $table->string('jenis_data');
            $table->date('tgl_transaksi');
            $table->string('kata_kunci');
            $table->string('status');
            $table->string('pesan');
            $table->string('eror');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_pengiriman_data');
    }
};
