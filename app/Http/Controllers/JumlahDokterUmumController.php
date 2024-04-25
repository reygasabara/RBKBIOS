<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SdmDokterUmum;
use App\Models\StatusPengiriman;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahDokterUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SdmDokterUmum::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';

        $getStatusPengiriman = StatusPengiriman::where('jenis_data', 'Dokter Spesialis')->first();
        $lastUpdateStatus = $getStatusPengiriman['updated_at']->format('Y-m-d');
        $nextUpdate = $getStatusPengiriman['pengiriman_selanjutnya'];

        $updated = $lastUpdate >= $lastUpdateStatus && $lastUpdate < $nextUpdate? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);
        
        return view('layers.jumlah-dokter-umum.index',["datas"=>$datas, 'active'=>['sdm', 'dokter_umum'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
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
        $checkedData = SdmDokterUmum::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->first();
        $status = $checkedData ? 'update' : 'add';

        if ($status == 'add') {
            $data = new SdmDokterUmum();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->pns = $validatedData['pns'];
            $data->pppk = $validatedData['pppk'];
            $data->anggota = $validatedData['anggota'];
            $data->non_pns_tetap = $validatedData['non_pns_tetap'];
            $data->kontrak = $validatedData['kontrak'];
            $data->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = SdmDokterUmum::where('tgl_transaksi', $validatedData['tgl_transaksi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->pns = $validatedData['pns'];
            $updatedData->pppk = $validatedData['pppk'];
            $updatedData->anggota = $validatedData['anggota'];
            $updatedData->non_pns_tetap = $validatedData['non_pns_tetap'];
            $updatedData->kontrak = $validatedData['kontrak'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/dokter-umum');   
    }

   /**
     * Remove the specified resource from storage.
     */
    public function destroy(SdmDokterUmum $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}