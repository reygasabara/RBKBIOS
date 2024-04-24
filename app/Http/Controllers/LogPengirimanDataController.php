<?php

namespace App\Http\Controllers;

use App\Models\LogPengirimanData;
use App\Http\Requests\StoreLogPengirimanDataRequest;
use App\Http\Requests\UpdateLogPengirimanDataRequest;

class LogPengirimanDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LogPengirimanData::orderBy('updated_at', 'DESC')->get();
        return view('layers.monitoring.log',["datas"=>$datas, 'active'=>['monitoring', 'log']]);
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
    public function store(StoreLogPengirimanDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LogPengirimanData $logPengirimanData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LogPengirimanData $logPengirimanData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogPengirimanDataRequest $request, LogPengirimanData $logPengirimanData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogPengirimanData $logPengirimanData)
    {
        //
    }
}
