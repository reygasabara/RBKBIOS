<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LayananTindakanOperasi;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahTindakanOperasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LayananTindakanOperasi::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.jumlah-tindakan-operasi.index',["datas"=>$datas, 'active'=>['layanan', 'operasi'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-tindakan-operasi.form',['active'=>['layanan', 'operasi']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'klasifikasi_operasi' => 'required|string',
            'jumlah' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);

        $status = 'add';
        $checkedData = LayananTindakanOperasi::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->get();

        foreach($checkedData as $data) {
            if($data['klasifikasi_operasi'] == $validatedData['klasifikasi_operasi']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new LayananTindakanOperasi();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->klasifikasi_operasi = $validatedData['klasifikasi_operasi'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data operasi ' . $validatedData['klasifikasi_operasi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = LayananTindakanOperasi::where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('klasifikasi_operasi', $validatedData['klasifikasi_operasi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->klasifikasi_operasi = $validatedData['klasifikasi_operasi'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data operasi ' . $validatedData['klasifikasi_operasi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/tindakan-operasi'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananTindakanOperasi $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}