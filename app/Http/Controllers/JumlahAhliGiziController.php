<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class JumlahAhliGiziController extends Controller
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

        $dataAhliGizi = Http::withHeaders(['token' => $token])->post('https://training-bios2.kemenkeu.go.id/api/get/data/kesehatan/sdm/nutritionist');
        $jsonAhliGizi = $dataAhliGizi->json();
        $ahliGizi = $jsonAhliGizi['data'];
        return view('layers.jumlah-ahli-gizi.index',["datas"=>$ahliGizi['datas'], 'active'=>'ahli_gizi', 'savedData' => session('savedData')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-ahli-gizi.form',['active'=>'ahli_gizi']);
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
       
       $getToken = Http::post('https://training-bios2.kemenkeu.go.id/api/token',[
        'satker' => '651650',
        'key' => 'O78gois12Lg94vqxxazS9N0uxtmwFQ8R'
        ]);

        $jsonToken = $getToken->json();
        $token = $jsonToken['token'];

        $response = Http::withHeaders(['token' => $token])->post('https://training-bios2.kemenkeu.go.id/api/ws/kesehatan/sdm/nutritionist', $validatedData);

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
                return Redirect::to('/ahli-gizi')->with('savedData', $savedData);  
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