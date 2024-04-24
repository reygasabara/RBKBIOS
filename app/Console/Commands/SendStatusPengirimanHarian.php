<?php

namespace App\Console\Commands;

use App\Models\StatusPengiriman;
use Illuminate\Console\Command;

class ResetStatusPengiriman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'edit:status-pengiriman-harian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset status pengiriman harian ...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $datas = StatusPengiriman::where('jadwal_pengiriman', 'Harian')->get();

        // foreach ($datas as $data) {
        //     $selectedData = StatusPengiriman::where('id', $data['id'])->get();
        //     $selectedData->update(['status' => 'Belum diperbarui']);
        // }
    }
}
