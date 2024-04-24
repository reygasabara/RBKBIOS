<?php

namespace App\Http\Controllers;

use App\Models\StatusPengiriman;
use App\Http\Requests\StoreStatusPengirimanRequest;
use App\Http\Requests\UpdateStatusPengirimanRequest;

class StatusPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = StatusPengiriman::all();
        return view('layers.monitoring.statusPengiriman',["datas"=>$datas, 'active'=>['monitoring', 'status']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusPengirimanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusPengiriman $statusPengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusPengiriman $statusPengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusPengirimanRequest $request, StatusPengiriman $statusPengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusPengiriman $statusPengiriman)
    {
        //
    }
}
