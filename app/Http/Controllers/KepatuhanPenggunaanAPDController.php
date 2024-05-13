<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StatusPengiriman;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\IktKepatuhanPenggunaanApd;

class KepatuhanPenggunaanAPDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = IktKepatuhanPenggunaanApd::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';

        $getStatusPengiriman = StatusPengiriman::where('jenis_data', 'Kepatuhan Penggunaan Alat Pelindung Diri (APD)')->first();
        $lastUpdateStatus =  $getStatusPengiriman['updated_at']->format('Y-m-d');
        $targetDate = Carbon::parse($getStatusPengiriman['pengiriman_selanjutnya'])->subday()->format('Y-m-d');

        $updated = $lastUpdate >= $targetDate || (Carbon::now()->format('Y-m-d') < $targetDate && $lastUpdate == $lastUpdateStatus)? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.kepatuhan-penggunaan-apd.index',["datas"=>$datas, 'active'=>['ikt', 'kepatuhan_apd'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.kepatuhan-penggunaan-apd.form',['active'=>['ikt', 'kepatuhan_apd']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'jumlah' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);
       
        $checkedData = IktKepatuhanPenggunaanApd::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->first();
        $status = $checkedData ? 'update' : 'add';

        if ($status == 'add') {
            $data = new IktKepatuhanPenggunaanApd();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = IktKepatuhanPenggunaanApd::where('tgl_transaksi', $validatedData['tgl_transaksi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/kepatuhan-penggunaan-apd');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IktKepatuhanPenggunaanApd $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}