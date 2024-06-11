<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SchedulerController extends Controller
{
    public function runCommand()
    {
        // $return_var = 0;
        // exec('D:\RBKBIOS-main\RBKBIOS-main\schedule\runScheduler.bat', $output, $return_var);

        // if ($return_var === 0) {
        //     alert()->success('Sukses!', 'Command scheduler telah dijalankan.');
        // } else {
        //     alert()->error('Sukses!', 'Command scheduler gagal dijalankan.');
        //     $this->info("Perintah gagal dijalankan.");
        // }
        try {
            $output = shell_exec('php ../artisan send:penerimaan');
            Log::info($output);
            $output = shell_exec('php ../artisan send:pengeluaran');
            Log::info($output);
            $output = shell_exec('php ../artisan send:saldo-operasional');
            Log::info($output);
            $output = shell_exec('php ../artisan send:saldo-pengelolaan-kas');
            Log::info($output);
            $output = shell_exec('php ../artisan send:saldo-dana-kelolaan');
            Log::info($output);

            $output = shell_exec('php ../artisan send:dokter-spesialis');
            Log::info($output);
            $output = shell_exec('php ../artisan send:dokter-gigi');
            Log::info($output);
            $output = shell_exec('php ../artisan send:dokter-umum');
            Log::info($output);
            $output = shell_exec('php ../artisan send:perawat');
            Log::info($output);
            $output = shell_exec('php ../artisan send:bidan');
            Log::info($output);
            $output = shell_exec('php ../artisan send:pranata-laboratorium');
            Log::info($output);
            $output = shell_exec('php ../artisan send:radiografer');
            Log::info($output);
            $output = shell_exec('php ../artisan send:ahli-gizi');
            Log::info($output);
            $output = shell_exec('php ../artisan send:fisioterapis');
            Log::info($output);
            $output = shell_exec('php ../artisan send:apoteker');
            Log::info($output);
            $output = shell_exec('php ../artisan send:tenaga-profesional-lainnya');
            Log::info($output);
            $output = shell_exec('php ../artisan send:tenaga-non-medis');
            Log::info($output);
            $output = shell_exec('php ../artisan send:tenaga-non-medis-administrasi');
            Log::info($output);
            $output = shell_exec('php ../artisan send:sanitarian');
            Log::info($output);
      
            $output = shell_exec('php ../artisan send:jumlah-pasien-ranap');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-pasien-igd');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-layanan-lab-sampel');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-layanan-lab-parameter');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-tindakan-operasi');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-layanan-radiologi');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-layanan-forensik');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-kunjungan-ralan');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-pasien-ralan');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-pasien-bpjs-non-bpjs');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-layanan-farmasi');
            Log::info($output);
            $output = shell_exec('php ../artisan send:bor');
            Log::info($output);
            $output = shell_exec('php ../artisan send:toi');
            Log::info($output);
            $output = shell_exec('php ../artisan send:alos');
            Log::info($output);
            $output = shell_exec('php ../artisan send:bto');
            Log::info($output);
            $output = shell_exec('php ../artisan send:jumlah-pelayanan-dokpol');
            Log::info($output);
            $output = shell_exec('php ../artisan send:ikm');
            Log::info($output);

            $output = shell_exec('php ../artisan send:visite-dibawah-jam-10');
            Log::info($output);
            $output = shell_exec('php ../artisan send:visite-10-sampai-12');
            Log::info($output);
            $output = shell_exec('php ../artisan send:visite-diatas-jam-12');
            Log::info($output);
            $output = shell_exec('php ../artisan send:dpjp-tidak-visite');
            Log::info($output);
            $output = shell_exec('php ../artisan send:visite-pertama');
            Log::info($output);
            $output = shell_exec('php ../artisan send:rasio-pobo');
            Log::info($output);
            $output = shell_exec('php ../artisan send:pendapaatan-aset-blu');
            Log::info($output);
            $output = shell_exec('php ../artisan send:penyelenggaraan-rme');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepatuhan-pelaksanaan-prokes');
            Log::info($output);
            $output = shell_exec('php ../artisan send:pembelian-alkes');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepuasan-pasien');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepatuhan-waktu-visite-dpjp');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepatuhan-kebersihan-tangan');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepatuhan-penggunaan-apd');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepatuhan-identifikasi-pasien');
            Log::info($output);
            $output = shell_exec('php ../artisan send:waktu-tanggap-operasi');
            Log::info($output);
            $output = shell_exec('php ../artisan send:waktu-tunggu-ralan');
            Log::info($output);
            $output = shell_exec('php ../artisan send:penundaan-operasi-elektif');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepatuhan-waktu-visite-dokter');
            Log::info($output);
            $output = shell_exec('php ../artisan send:pelaporan-hasil-kritis-laboratorium');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepatuhan-penggunaan-fornas');
            Log::info($output);
            $output = shell_exec('php ../artisan send:kepatuhan-alur-klinis');
            Log::info($output);
            $output = shell_exec('php ../artisan send:pencegahan-resiko-pasien-jatuh');
            Log::info($output);
            $output = shell_exec('php ../artisan send:waktu-tanggap-komplain');
            Log::info($output);

            alert()->success('Sukses!', 'Seluruh data berhasil dikirim.');
            
        } catch (\Exception $e) {
            alert()->error('Gagal!', 'Terdapat data yang gagal dikirim.');
        }
        return redirect()->back();  
    }
}
