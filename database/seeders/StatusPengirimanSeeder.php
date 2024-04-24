<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusPengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_pengiriman')->insert([[
            'modul' => 'Keuangan',
            'jenis_data' => 'Penerimaan',
            'jadwal_pengiriman' => 'Harian',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2000-01-01',
            'created_at' => '2000-01-01 00:00:00',
            'updated_at' => '2000-01-01 00:00:00',
        ], [
            'modul' => 'Keuangan',
            'jenis_data' => 'Pengeluaran',
            'jadwal_pengiriman' => 'Harian',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2000-01-01',
            'created_at' => '2000-01-01 00:00:00',
            'updated_at' => '2000-01-01 00:00:00',
        ], [
            'modul' => 'Keuangan',
            'jenis_data' => 'Saldo Rekening - Operasional',
            'jadwal_pengiriman' => 'Harian',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2000-01-01',
            'created_at' => '2000-01-01 00:00:00',
            'updated_at' => '2000-01-01 00:00:00',
        ], [
            'modul' => 'Keuangan',
            'jenis_data' => 'Saldo Rekening - Pengelolaan Kas',
            'jadwal_pengiriman' => 'Harian',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2000-01-01',
            'created_at' => '2000-01-01 00:00:00',
            'updated_at' => '2000-01-01 00:00:00',
        ], [
            'modul' => 'Keuangan',
            'jenis_data' => 'Saldo Rekening - Dana Kelolaan',
            'jadwal_pengiriman' => 'Harian',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2000-01-01',
            'created_at' => '2000-01-01 00:00:00',
            'updated_at' => '2000-01-01 00:00:00',
        ]]);
    }
}
