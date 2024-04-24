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
        Schema::create('status_pengiriman', function (Blueprint $table) {
            $table->id();
            $table->string('modul');
            $table->string('jenis_data');
            $table->string('jadwal_pengiriman');
            $table->string('status');
            $table->date('pengiriman_selanjutnya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pengiriman');
    }
};
