<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SdmBidan;
use Illuminate\Http\Request;
use App\Models\StatusPengiriman;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahTenagaBidanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SdmBidan::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';

        $getStatusPengiriman = StatusPengiriman::where('jenis_data', 'Jumlah Tenaga Bidan')->first();
        $lastUpdateStatus = $getStatusPengiriman['updated_at']->format('Y-m-d');
        $targetDate = Carbon::parse($getStatusPengiriman['pengiriman_selanjutnya'])->subday()->format('Y-m-d');

        $updated = $lastUpdate >= $targetDate || (Carbon::now()->format('Y-m-d') < $targetDate && $lastUpdate == $lastUpdateStatus)? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.jumlah-tenaga-bidan.index',["datas"=>$datas, 'active'=>['sdm', 'bidan'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-tenaga-bidan.form',['active'=>['sdm', 'bidan']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'pns' => 'required|numeric',
            'pppk' => 'required|numeric',
            'anggota' => 'required|numeric',
            'non_pns_tetap' => 'required|numeric',
            'kontrak' => 'required|numeric'
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);

        $checkedData = SdmBidan::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->first();
        $status = $checkedData ? 'update' : 'add';

        if ($status == 'add') {
            $data = new SdmBidan();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->pns = $validatedData['pns'];
            $data->pppk = $validatedData['pppk'];
            $data->anggota = $validatedData['anggota'];
            $data->non_pns_tetap = $validatedData['non_pns_tetap'];
            $data->kontrak = $validatedData['kontrak'];
            $data->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = SdmBidan::where('tgl_transaksi', $validatedData['tgl_transaksi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->pns = $validatedData['pns'];
            $updatedData->pppk = $validatedData['pppk'];
            $updatedData->anggota = $validatedData['anggota'];
            $updatedData->non_pns_tetap = $validatedData['non_pns_tetap'];
            $updatedData->kontrak = $validatedData['kontrak'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/bidan');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SdmBidan $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
