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
        $schedule->command('send:penerimaan')->dailyAt('15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pengeluaran')->dailyAt('15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-operasional')->dailyAt('15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-pengelolaan-kas')->dailyAt('15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:saldo-dana-kelolaan')->dailyAt('15:00')->appendOutputTo('storage/logs/laravel.log');

        $schedule->command('send:dokter-spesialis')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:dokter-gigi')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:dokter-umum')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:perawat')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:bidan')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pranata-laboratorium')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:radiografer')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:ahli-gizi')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:fisioterapis')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:apoteker')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-profesional-lainnya')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-non-medis')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-non-medis-administrasi')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:sanitarian')->yearlyOn(1, 1, '15:00')->appendOutputTo('storage/logs/laravel.log');

        $schedule->command('reset:status-pengiriman-data-harian')->dailyAt('08:30')->appendOutputTo('storage/logs/laravel.log');
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
