<?php

namespace App\Console\Commands;

use App\Models\IktKepatuhanWaktuVisiteDpjp;
use App\Models\IktKepuasanPasien;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\StatusPengiriman;
use App\Models\LogPengirimanData;
use Illuminate\Support\Facades\Http;

class SendKepatuhanWaktuVisiteDpjp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:kepatuhan-waktu-visite-dpjp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim data kepatuhan waktu visite DPJP ...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("[ " . Carbon::now() . " ] " . $this->description);
        $targetDate = Carbon::now()->subDay()->format('Y-m-d');
        $datas = IktKepatuhanWaktuVisiteDpjp::whereDate('tgl_transaksi', $targetDate)->get();
        $statusPengiriman = [];

        foreach ($datas as $data) {

            $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
            'satker' => env('TOKEN_SATKER'),
            'key' => env('TOKEN_KEY')
            ]);

            $jsonToken = $getToken->json();
            $token = $jsonToken['token'];

            $response = Http::withHeaders(['token' => $token])->post('Https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/ws/kesehatan/ikt/kepatuhan_waktu_visite_dpjp', $data);

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
            $log->modul = 'IKT';
            $log->jenis_data = 'Kepatuhan Waktu Visite DPJP';
            $log->tgl_transaksi = $data['tgl_transaksi'];
            $log->kata_kunci = '-';
            $log->status = $status;
            $log->pesan = $message;
            $log->eror = $errors;
            $log->waktu_pengiriman = Carbon::now();
            $log->save();
        }

        $selectedData = StatusPengiriman::Where('jenis_data', 'Kepatuhan Waktu Visite DPJP')->firstOrFail();

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

        $selectedData->pengiriman_selanjutnya = Carbon::now()->addMonths(3)->format('Y-m-d');
        $selectedData->save();

        $this->info('-----Proses pengiriman data selesai------');
    }
}
