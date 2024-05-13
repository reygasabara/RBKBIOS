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
        $schedule->command('send:penerimaan')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pengeluaran')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-operasional')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-pengelolaan-kas')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-dana-kelolaan')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');


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

        
        $schedule->command('send:jumlah-pasien-ranap')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-pasien-igd')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-lab-sampel')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-lab-parameter')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-tindakan-operasi')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-radiologi')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-forensik')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-kunjungan-ralan')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-pasien-ralan')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-pasien-bpjs-non-bpjs')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-layanan-farmasi')->dailyAt('15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:bor')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:toi')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:alos')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:bto')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:jumlah-pelayanan-dokpol')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:ikm')->monthlyOn(1, '15:30')->appendOutputTo('storage/logs/laravel.log');


        $schedule->command('reset:status-pengiriman-data-harian')->dailyAt('08:30')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('reset:status-pengiriman-data-bulanan')->monthlyOn(1, '08:30')->appendOutputTo('storage/logs/laravel.log');
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
