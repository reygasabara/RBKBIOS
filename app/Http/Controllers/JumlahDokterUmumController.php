<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class JumlahDokterUmumController extends Controller
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

        $getData = Http::withHeaders(['token' => $token])->post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/get/data/kesehatan/sdm/dokter_umum');
        $dataJson = $getData->json();
        $dataFromJson = $dataJson['data'];
        $datas = $dataFromJson['datas'];
        
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

        $filterNotifikasi = Notifikasi::where('submenu', 'Dokter Umum')->orderBy('updated_at', 'DESC')->get();

        if ($filterNotifikasi->isNotEmpty()) {
            foreach ($filterNotifikasi as $data) {
                $pesan = '[' . $data['updated_at'] . '] ' . $data['pesan'] . ' pada transaksi tanggal ' . $data['tgl_transaksi'];
                array_push($notifikasi, $pesan);
            }
            $updateStatus = 'partially updated';
        }

        return view('layers.jumlah-dokter-umum.index',["datas"=>$datas, 'active'=>['sdm', 'dokter_umum'], "updateStatus"=>$updateStatus, "lastUpdate"=>$lastUpdate, 'notifikasi' => $notifikasi, 'updateDatetime' => $updateDatetime, 'savedData' => session('savedData')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-dokter-umum.form',['active'=>['sdm', 'dokter_umum']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d',
            'pns' => 'required|numeric',
            'pppk' => 'required|numeric',
            'anggota' => 'required|numeric',
            'non_pns_tetap' => 'required|numeric',
            'kontrak' => 'required|numeric'
        ]);
       
       $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
        'satker' => env('TOKEN_SATKER'),
        'key' => env('TOKEN_KEY')
        ]);

        $jsonToken = $getToken->json();
        $token = $jsonToken['token'];

        $response = Http::withHeaders(['token' => $token])->post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/ws/kesehatan/sdm/dokter_umum', $validatedData);

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
                return Redirect::to('/dokter-umum')->with('savedData', $savedData);  
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
