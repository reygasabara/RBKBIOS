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

        DB::table('status_pengiriman')->insert([[
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Dokter Spesialis',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Dokter Gigi',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Dokter Umum',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Tenaga Perawat',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Tenaga Bidan',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Pranata Laboratorium',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Radiografer',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Ahli Gizi',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Fisioterapis',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Apoteker',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Tenaga Profesional Lainnya',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Tenaga Non-Medis',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Tenaga Non-Medis Administrasi',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ], [
            'modul' => 'SDM',
            'jenis_data' => 'Jumlah Sanitarian',
            'jadwal_pengiriman' => 'Tahunan',
            'status' => 'Belum diperbarui',
            'pengiriman_selanjutnya' => '2025-01-01',
            'created_at' => '2024-01-01 00:00:00',
            'updated_at' => '2024-01-01 00:00:00',
        ]]);
    }
}
