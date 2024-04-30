<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\LayananPasienBPJSNonBPJS;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahPasienBPJSdanNonBPJSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LayananPasienBPJSNonBPJS::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.jumlah-pasien-bpjs-nonbpjs.index',["datas"=>$datas, 'active'=>['layanan', 'bpjs_nonbpjs'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-pasien-bpjs-nonbpjs.form',['active'=>['layanan', 'bpjs_nonbpjs']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'jumlah_bpjs' => 'required|numeric',
            'jumlah_non_bpjs' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);
       
        $checkedData = LayananPasienBPJSNonBPJS::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->first();
        $status = $checkedData ? 'update' : 'add';

        if ($status == 'add') {
            $data = new LayananPasienBPJSNonBPJS();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->jumlah_bpjs = $validatedData['jumlah_bpjs'];
            $data->jumlah_non_bpjs = $validatedData['jumlah_non_bpjs'];
            $data->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = LayananPasienBPJSNonBPJS::where('tgl_transaksi', $validatedData['tgl_transaksi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->jumlah_bpjs = $validatedData['jumlah_bpjs'];
            $updatedData->jumlah_bpjs = $validatedData['jumlah_bpjs'];
            $updatedData->jumlah_non_bpjs = $validatedData['jumlah_non_bpjs'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/pasien-bpjs-nonbpjs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananPasienBPJSNonBPJS $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
