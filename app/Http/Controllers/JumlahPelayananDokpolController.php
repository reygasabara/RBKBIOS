<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class JumlahPelayananDokpolController extends Controller
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

        $dataDokpol = Http::withHeaders(['token' => $token])->post('https://training-bios2.kemenkeu.go.id/api/get/data/kesehatan/layanan/dokpol');
        $jsonDokpol = $dataDokpol->json();
        $dokpol = $jsonDokpol['data'];
        return view('layers.jumlah-layanan-dokpol.index',["datas"=>$dokpol['datas'], 'active'=>['layanan', 'dokpol'], 'savedData' => session('savedData')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-layanan-dokpol.form',['active'=>['layanan', 'dokpol']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d',
            'kedokteran_forensik' => 'required|numeric',
            'psikiatri_forensik' => 'required|numeric',
            'sentra_visum_dan_medikolegal' => 'required|numeric',
            'ppat' => 'required|numeric',
            'odontologi_forensik' => 'required|numeric',
            'psikologi_forensik' => 'required|numeric',
            'antropologi_forensik' => 'required|numeric',
            'olah_tkp_medis' => 'required|numeric',
            'kesehatan_tahanan' => 'required|numeric',
            'narkoba' => 'required|numeric',
            'toksikologi_medik' => 'required|numeric',
            'pelayanan_dna' => 'required|numeric',
            'pam_keslap_food_security' => 'required|numeric',
            'dvi' => 'required|numeric',
        ]);

       $getToken = Http::post('https://training-bios2.kemenkeu.go.id/api/token',[
        'satker' => '651650',
        'key' => 'O78gois12Lg94vqxxazS9N0uxtmwFQ8R'
        ]);

        $jsonToken = $getToken->json();
        $token = $jsonToken['token'];

        $response = Http::withHeaders(['token' => $token])->post('https://training-bios2.kemenkeu.go.id/api/ws/kesehatan/layanan/dokpol', $validatedData);

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
                return Redirect::to('/dokpol')->with('savedData', $savedData);  
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
