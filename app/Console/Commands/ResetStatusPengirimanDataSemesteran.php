<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\StatusPengiriman;

class ResetStatusPengirimanDataSemesteran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:status-pengiriman-data-semesteran';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset status pengiriman data semesteran ...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $datas = StatusPengiriman::where('jadwal_pengiriman', 'Semesteran')->get();

        foreach ($datas as $data) {
            $this->info($data['jenis_data']);
            $selectedData = StatusPengiriman::findOrFail($data['id']);
            $selectedData->status = 'Belum diperbarui';
            $selectedData->save();
        }
    }
}
