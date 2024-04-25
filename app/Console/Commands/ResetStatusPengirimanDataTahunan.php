<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\StatusPengiriman;

class ResetStatusPengirimanDataTahunan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset-status-pengiriman-data-tahunan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $datas = StatusPengiriman::where('jadwal_pengiriman', 'Tahunan')->get();

        foreach ($datas as $data) {
            $this->info($data['jenis_data']);
            $selectedData = StatusPengiriman::findOrFail($data['id']);
            $selectedData->status = 'Belum diperbarui';
            $selectedData->save();
        }
    }
}
