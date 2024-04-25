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

        $schedule->command('send:dokter-spesialis')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:dokter-gigi')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:dokter-umum')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:perawat')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:bidan')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:pranata-laboratorium')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:radiografer')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:ahli-gizi')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:fisioterapis')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:apoteker')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-profesional-lainnya')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-non-medis')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:tenaga-non-medis-administrasi')->everyMinute()->appendOutputTo('storage/logs/laravel.log');
        $schedule->command('send:sanitarian')->everyMinute()->appendOutputTo('storage/logs/laravel.log');

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
