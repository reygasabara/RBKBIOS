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
        Schema::create('sdm_non_medis_administrasis', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->integer('pns');
            $table->integer('pppk');
            $table->integer('anggota');
            $table->integer('non_pns_tetap');
            $table->integer('kontrak');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdm_non_medis_administrasis');
    }
};
