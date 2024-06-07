<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('send:penerimaan')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pengeluaran')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-operasional')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-pengelolaan-kas')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-dana-kelolaan')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');


        $schedule->command('send:dokter-spesialis')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:dokter-gigi')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:dokter-umum')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:perawat')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:bidan')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pranata-laboratorium')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:radiografer')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:ahli-gizi')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:fisioterapis')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:apoteker')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-profesional-lainnya')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-non-medis')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-non-medis-administrasi')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:sanitarian')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');

        
        $schedule->command('send:jumlah-pasien-ranap')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-pasien-igd')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-lab-sampel')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-lab-parameter')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-tindakan-operasi')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-radiologi')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-forensik')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-kunjungan-ralan')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-pasien-ralan')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-pasien-bpjs-non-bpjs')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-farmasi')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:bor')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:toi')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:alos')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:bto')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-pelayanan-dokpol')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:ikm')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');


        $schedule->command('send:visite-dibawah-jam-10')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:visite-10-sampai-12')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:visite-diatas-jam-12')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:dpjp-tidak-visite')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:visite-pertama')->dailyAt('09:25')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:rasio-pobo')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pendapaatan-aset-blu')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:penyelenggaraan-rme')->quarterlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepatuhan-pelaksanaan-prokes')->quarterlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pembelian-alkes')->yearlyOn(1, 1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepuasan-pasien')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepatuhan-waktu-visite-dpjp')->quarterlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepatuhan-kebersihan-tangan')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepatuhan-penggunaan-apd')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepatuhan-identifikasi-pasien')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:waktu-tanggap-operasi')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:waktu-tunggu-ralan')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:penundaan-operasi-elektif')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepatuhan-waktu-visite-dokter')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pelaporan-hasil-kritis-laboratorium')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepatuhan-penggunaan-fornas')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:kepatuhan-alur-klinis')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pencegahan-resiko-pasien-jatuh')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:waktu-tanggap-komplain')->cron('30 15 1 1,7 *')->appendOutputTo('storage/logs/laravel.log');


        $schedule->command('reset:status-pengiriman-data-harian')->dailyAt('08:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('reset:status-pengiriman-data-bulanan')->monthlyOn(1, '08:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('reset:status-pengiriman-data-triwulanan')->quarterlyOn(1, '08:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('reset:status-pengiriman-data-semesteran')->cron('30 15 1 1,7 *') ->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('reset:status-pengiriman-data-tahunan')->yearlyOn(1, 1, '08:30')->appendOutputTo('storage/logs/laravel.log');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
