<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\StatusPengiriman;
use Carbon\Carbon;

class ResetStatusPengirimanDataHarian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:status-pengiriman-data-harian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset status pengiriman data harian ...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $datas = StatusPengiriman::where('jadwal_pengiriman', 'Harian')->get();

        foreach ($datas as $data) {
            $this->info($data['jenis_data']);
            $selectedData = StatusPengiriman::findOrFail($data['id']);
            $selectedData->status = 'Belum diperbarui';
            // $selectedData->pengiriman_selanjutnya = Carbon::tomorrow()->format('Y-m-d');
            $selectedData->save();
        }
    }
}
