<?php

namespace App\Console\Commands;

use App\Models\LayananALOS;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\StatusPengiriman;
use App\Models\LogPengirimanData;
use Illuminate\Support\Facades\Http;

class SendAlos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:alos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim data ALOS ...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("[ " . Carbon::now() . " ] " . $this->description);
        $targetDate = Carbon::now()->subDay()->format('Y-m-d');
        $datas = LayananALOS::whereDate('tgl_transaksi', $targetDate)->get();
        $statusPengiriman = [];

        foreach ($datas as $data) {

            $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
            'satker' => env('TOKEN_SATKER'),
            'key' => env('TOKEN_KEY')
            ]);

            $jsonToken = $getToken->json();
            $token = $jsonToken['token'];

            $response = Http::withHeaders(['token' => $token])->post('Https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/ws/kesehatan/layanan/alos', $data);

            $message = $response->json()['message'];
            $errorResponse = $response->json()['error'];
            $errors = 'Tidak ada';

            if ($response->successful()) { 
                if ($errorResponse) {
                    $error = true;
                    $errorLists = [];

                    foreach ($errorResponse as $fields) {
                        foreach ($fields as $error) {
                            array_push($errorLists, $error);
                        }
                    }

                    $errors = implode(', ', $errorLists);
                    $status = 'Gagal';
                    array_push($statusPengiriman, $status);

                    $this->info('-> ' . json_encode($message) . '. Penyebab eror: ' .  json_encode($errorLists)); 
                } else {
                    $status = 'Sukses';
                    array_push($statusPengiriman, $status);

                    $this->info('-> ' . $message);  
                }
            } else {
                $errorLists = [];
                
                foreach ($errorResponse as $fields) {
                    foreach ($fields as $error) {
                        array_push($errorLists, $error);
                    }
                }
                
                $errors = implode(', ', $errorLists);
                $status = 'Gagal';
                array_push($statusPengiriman, $status);

                $this->info('-> ' . json_encode($message) .  json_encode($errorLists)); 
            }

            $log = new LogPengirimanData();
            $log->modul = 'Layanan';
            $log->jenis_data = 'Average Length of Stay (ALOS)';
            $log->tgl_transaksi = $data['tgl_transaksi'];
            $log->kata_kunci = '-';
            $log->status = $status;
            $log->pesan = $message;
            $log->eror = $errors;
            $log->waktu_pengiriman = Carbon::now();
            $log->save();
        }

        $selectedData = StatusPengiriman::Where('jenis_data', 'Average Length of Stay (ALOS)')->firstOrFail();

        if(count($statusPengiriman) == 0) {
            $selectedData->status = 'Tidak ada data';
        } else if(in_array("Gagal", $statusPengiriman)) {
            if(in_array("Sukses", $statusPengiriman)) {
                $selectedData->status = 'Diperbarui sebagian';
            } else {
                $selectedData->status = 'Gagal diperbarui';
            }
        } else {
            $selectedData->status = 'Telah diperbarui';
        }

        $selectedData->pengiriman_selanjutnya = Carbon::now()->addMonth()->format('Y-m-d');
        $selectedData->save();

        $this->info('-----Proses pengiriman data selesai------');
    }
}
