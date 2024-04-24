<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Notifikasi;
use Illuminate\Console\Command;
use App\Models\StatusPengiriman;
use App\Models\LogPengirimanData;
use App\Models\SaldoDanaKelolaan;
use Illuminate\Support\Facades\Http;

class SendSaldoDanaKelolaan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:saldo-dana-kelolaan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim data saldo rekening dana kelolaan (keuangan)...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("[ " . Carbon::now() . " ] " . $this->description);
        $targetDate = Carbon::yesterday()->format('Y-m-d');
        $datas = SaldoDanaKelolaan::whereDate('tgl_transaksi', $targetDate)->get();
        $statusPengiriman = [];

        foreach ($datas as $data) {

            $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
            'satker' => env('TOKEN_SATKER'),
            'key' => env('TOKEN_KEY')
            ]);

            $jsonToken = $getToken->json();
            $token = $jsonToken['token'];

            $response = Http::withHeaders(['token' => $token])->post('Https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/ws/keuangan/saldo/saldo_dana_kelolaan', $data);

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
            $log->modul = 'Keuangan';
            $log->jenis_data = 'Saldo Rekening - Dana Kelolaan';
            $log->tgl_transaksi = $data['tgl_transaksi'];
            $log->kata_kunci = 'No. rek.: ' . $data['no_rekening'];
            $log->status = $status;
            $log->pesan = $message;
            $log->eror = $errors;
            $log->waktu_pengiriman = Carbon::now();
            $log->save();
        }

        $selectedData = StatusPengiriman::Where('jenis_data', 'Saldo Rekening - Dana Kelolaan')->firstOrFail();

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

        $selectedData->pengiriman_selanjutnya = Carbon::tomorrow()->format('Y-m-d');
        $selectedData->save();

        $this->info('-----Proses pengiriman data selesai------');
    }
}

