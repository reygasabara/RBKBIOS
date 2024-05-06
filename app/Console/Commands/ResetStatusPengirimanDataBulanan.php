<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\StatusPengiriman;

class ResetStatusPengirimanDataBulanan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:status-pengiriman-data-bulanan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset status pengiriman data bulanan ...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $datas = StatusPengiriman::where('jadwal_pengiriman', 'Bulanan')->get();

        foreach ($datas as $data) {
            $this->info($data['jenis_data']);
            $selectedData = StatusPengiriman::findOrFail($data['id']);
            $selectedData->status = 'Belum diperbarui';
            $selectedData->save();
        }
    }
}
