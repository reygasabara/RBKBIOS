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
        Schema::create('saldo_dana_kelolaans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->string('kdbank', 3);
            $table->string('no_rekening');
            $table->unsignedInteger('saldo_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldo_dana_kelolaans');
    }
};
