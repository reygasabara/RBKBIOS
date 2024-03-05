<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class PenundaanOperasiElektifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getToken = Http::post('https://training-bios2.kemenkeu.go.id/api/token',[
            'satker' => '651650',
            'key' => 'O78gois12Lg94vqxxazS9N0uxtmwFQ8R'
        ]);
        $jsonToken = $getToken->json();
        $token = $jsonToken['token'];

        $dataPenundaanOperasiElektif = Http::withHeaders(['token' => $token])->post('https://training-bios2.kemenkeu.go.id/api/get/data/kesehatan/ikt/penundaan_operasi_elektif');
        $jsonPenundaanOperasiElektif = $dataPenundaanOperasiElektif->json();
        $penundaanOperasiElektif = $jsonPenundaanOperasiElektif['data'];
        return view('layers.penundaan-operasi-elektif.index',["datas"=>$penundaanOperasiElektif['datas'], 'active'=>['ikt', 'penundaan_operasi_elektif'], 'savedData' => session('savedData')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.penundaan-operasi-elektif.form',['active'=>['ikt', 'penundaan_operasi_elektif']]);
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
       
        $getToken = Http::post('https://training-bios2.kemenkeu.go.id/api/token',[
        'satker' => '651650',
        'key' => 'O78gois12Lg94vqxxazS9N0uxtmwFQ8R'
        ]);

        $jsonToken = $getToken->json();
        $token = $jsonToken['token'];

        $response = Http::withHeaders(['token' => $token])->post('https://training-bios2.kemenkeu.go.id/api/ws/kesehatan/ikt/penundan_operasi_elektif', $validatedData);

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
                return Redirect::to('/penundaan-operasi-elektif')->with('savedData', $savedData);  
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
