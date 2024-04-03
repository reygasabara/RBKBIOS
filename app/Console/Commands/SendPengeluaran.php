<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Notifikasi;
use App\Models\Pengeluaran;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendPengeluaran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:pengeluaran';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim data pengeluaran keuangan...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("[ " . Carbon::now() . " ] " . $this->description);

        $pengeluaran = Pengeluaran::all();
        $error = false;

        foreach ($pengeluaran as $data) {

            $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
            'satker' => env('TOKEN_SATKER'),
            'key' => env('TOKEN_KEY')
            ]);

            $jsonToken = $getToken->json();
            $token = $jsonToken['token'];

            $response = Http::withHeaders(['token' => $token])->post('Https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/ws/keuangan/akuntansi/pengeluaran', $data);

            $message = $response->json()['message'];
            $errorResponse = $response->json()['error'];

            if ($response->successful()) { 
                if ($errorResponse) {
                    $error = true;
                    $errorLists = [];

                    foreach ($errorResponse as $fields) {
                        foreach ($fields as $error) {
                            array_push($errorLists, $error);
                        }
                    }

                    $this->info('-> ' . json_encode($message) . '. Penyebab eror: ' .  json_encode($errorLists)); 
                    
                    $notifikasi = new Notifikasi();
                    $notifikasi->tgl_transaksi = $data['tgl_transaksi'];
                    $notifikasi->submenu = 'Pengeluaran';
                    $notifikasi->keunikan = $data['kd_akun'];
                    $notifikasi->pesan = $message . '. Penyebabnya adalah ' . implode(', ', $errorLists);
                    $notifikasi->save();
                } else {
                    $this->info('-> ' . $message);  
                }
            } else {
                $errorLists = [];
                
                foreach ($errorResponse as $fields) {
                    foreach ($fields as $error) {
                        array_push($errorLists, $error);
                    }
                }
                
                $this->info('-> ' . json_encode($message) .  json_encode($errorLists)); 
                
                $notifikasi = new Notifikasi();
                $notifikasi->submenu = 'Pengeluaran';
                $notifikasi->pesan = $message . ' karena ' . implode(', ', $errorLists) . '.';
                $notifikasi->save();
            }
        }

        if (!$error) {
            Notifikasi::where('submenu', 'Pengeluaran')->delete();
        }

        $this->info('-----Proses pengiriman data selesai------');
    }
}
