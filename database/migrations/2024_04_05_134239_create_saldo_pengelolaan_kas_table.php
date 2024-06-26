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
        Schema::create('saldo_pengelolaan_kas', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->string('no_bilyet', 50);
            $table->integer('nilai_deposito')->limit(20);
            $table->integer('nilai_bunga')->limit(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldo_pengelolaan_kas');
    }
};
