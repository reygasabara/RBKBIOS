<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JumlahTenagaPerawatController extends Controller
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

        $dataPerawat = Http::withHeaders(['token' => $token])->post('https://training-bios2.kemenkeu.go.id/api/get/data/kesehatan/sdm/perawat');
        $jsonPerawat = $dataPerawat->json();
        $perawat = $jsonPerawat['data'];
        // dd($perawat['datas']);
        return view('layers.jumlah-tenaga-perawat.index',["datas"=>$perawat['datas']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('layers.jumlah-tenaga-perawat.form');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
