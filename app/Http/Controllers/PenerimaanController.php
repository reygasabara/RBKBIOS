<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
            'satker' => env('TOKEN_SATKER'),
            'key' => env('TOKEN_KEY')
        ]);
        $jsonToken = $getToken->json();
        $token = $jsonToken['token'];

        $dataPenerimaan = Http::withHeaders(['token' => $token])->post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/get/data/keuangan/akuntansi/penerimaan');
        $jsonPenerimaan = $dataPenerimaan->json();
        $penerimaan = $jsonPenerimaan['data'];
        $datas = $penerimaan['datas'];
        
        usort($datas, function($a, $b) {
            return strtotime($a['updated_at']) - strtotime($b['updated_at']);
        });
            
        $lastUpdate = end($datas)['updated_at'];
        $updateDatetime = date("Y-m-d 15:00:00", strtotime("-1 day"));
        $updateStatus = 'not updated';
        $notifikasi = []; 

        if ($lastUpdate >= $updateDatetime) {
            $updateStatus = 'updated';
        } 

        $filterNotifikasi = Notifikasi::where('submenu', 'Penerimaan')->get();

        if ($filterNotifikasi->isNotEmpty()) {
            foreach ($filterNotifikasi as $data) {
                $pesan = '[' . $data['updated_at'] . '] ' . $data['pesan'] . ' pada transaksi tanggal ' . $data['tgl_transaksi'] . ' dengan kode akun ' . $data['keunikan'] . '.';
                array_push($notifikasi, $pesan);
            }
            $updateStatus = 'partially updated';
        }

        return view('layers.penerimaan.index',["datas"=>$datas, 'active'=>['keuangan', 'penerimaan'], "updateStatus"=>$updateStatus, "lastUpdate"=>$lastUpdate, 'notifikasi' => $notifikasi, 'updateDatetime' => $updateDatetime, 'savedData' => session('savedData')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.penerimaan.form',['active'=>['keuangan', 'penerimaan']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d',
            'kd_akun' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ]);

       $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
        'satker' => env('TOKEN_SATKER'),
        'key' => env('TOKEN_KEY')
        ]);

        $jsonToken = $getToken->json();
        $token = $jsonToken['token'];

        $response = Http::withHeaders(['token' => $token])->post('Https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/ws/keuangan/akuntansi/penerimaan', $validatedData);

        $message = $response->json()['message'];
        $errorResponse = $response->json()['error'];

        if ($response->successful()) { 
            if ($errorResponse) {
                $errorLists = [];

                foreach ($errorResponse as $fields) {
                    foreach ($fields as $error) {
                        array_push($errorLists, $error);
                    }
                }

                return redirect()->back()->withErrors($errorLists)->withInput($validatedData)->with('message', $message);  
            } else {
                $savedData = true;
                return Redirect::to('/penerimaan')->with('savedData', $savedData);  
            }
        } else {
            $errorLists = [];

            foreach ($errorResponse as $fields) {
                foreach ($fields as $error) {
                    array_push($errorLists, $error);
                }
            }

            return redirect()->back()->withErrors($errorLists)->withInput($validatedData)->with('message', $message);  
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
