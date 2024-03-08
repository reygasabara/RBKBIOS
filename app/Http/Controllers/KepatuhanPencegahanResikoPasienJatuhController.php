<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class KepatuhanPencegahanResikoPasienJatuhController extends Controller
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

        $dataKepatuhanPencegahanPasienJatuh = Http::withHeaders(['token' => $token])->post('https://' . '' . env('DOMAIN_NAME') . '' . '.kemenkeu.go.id/api/get/data/kesehatan/ikt/kepatuhan_upaya_pencegahan_resiko_pasien_jatuh');
        $jsonKepatuhanPencegahanPasienJatuh = $dataKepatuhanPencegahanPasienJatuh->json();
        dd($jsonKepatuhanPencegahanPasienJatuh);
        $kepatuhanPencegahanPasienJatuh = $jsonKepatuhanPencegahanPasienJatuh['data'];
        return view('layers.kepatuhan-upaya-pencegahan-resiko-pasien-jatuh.index',["datas"=>$kepatuhanPencegahanPasienJatuh['datas'], 'active'=>['ikt', 'kepatuhan_upaya_pencegahan_resiko_pasien_jatuh'], 'savedData' => session('savedData')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.kepatuhan-upaya-pencegahan-resiko-pasien-jatuh.form',['active'=>['ikt', 'kepatuhan_upaya_pencegahan_resiko_pasien_jatuh']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d',
            'jumlah' => 'required|numeric',
        ]);
       
        $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
        'satker' => env('TOKEN_SATKER'),
        'key' => env('TOKEN_KEY')
        ]);

        $jsonToken = $getToken->json();
        $token = $jsonToken['token'];

        $response = Http::withHeaders(['token' => $token])->post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/ws/kesehatan/ikt/kepatuhan_upaya_pencegahan_resiko_pasien_jatuh', $validatedData);

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
                return Redirect::to('/kepatuhan-upaya-pencegahan-resiko-pasien-jatuh')->with('savedData', $savedData);
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
