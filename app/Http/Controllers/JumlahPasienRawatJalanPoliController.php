<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LayananJumlahPasienRalan;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahPasienRawatJalanPoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LayananJumlahPasienRalan::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.jumlah-pasien-ralan-poli.index',["datas"=>$datas, 'active'=>['layanan', 'pasien_ralan_poli'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-pasien-ralan-poli.form',['active'=>['layanan', 'pasien_ralan_poli']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'nama_poli' => 'required|string',
            'jumlah' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);

        $status = 'add';
        $checkedData = LayananJumlahPasienRalan::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->get();

        foreach($checkedData as $data) {
            if($data['nama_poli'] == $validatedData['nama_poli']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new LayananJumlahPasienRalan();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->nama_poli = $validatedData['nama_poli'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data poli ' . $validatedData['nama_poli'] . ' berhasil ditambahkan');
        } else {
            $updatedData = LayananJumlahPasienRalan::where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('nama_poli', $validatedData['nama_poli'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->nama_poli = $validatedData['nama_poli'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data poli ' . $validatedData['nama_poli'] . ' berhasil diperbarui');
        }

        return Redirect::to('/pasien-ralan-poli'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananJumlahPasienRalan $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
