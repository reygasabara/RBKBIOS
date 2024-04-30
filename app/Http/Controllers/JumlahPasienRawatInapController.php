<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LayananJumlahPasienRanap;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahPasienRawatInapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LayananJumlahPasienRanap::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.jumlah-pasien-ranap.index',["datas"=>$datas, 'active'=>['layanan', 'pasien_ranap'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-pasien-ranap.form',['active'=>['layanan', 'pasien_ranap']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'kode_kelas' => 'required|string',
            'jumlah' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);

        $status = 'add';
        $checkedData = LayananJumlahPasienRanap::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->get();

        foreach($checkedData as $data) {
            if($data['kode_kelas'] == $validatedData['kode_kelas']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new LayananJumlahPasienRanap();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->kode_kelas = $validatedData['kode_kelas'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data kelas ' . $validatedData['kode_kelas'] . ' berhasil ditambahkan');
        } else {
            $updatedData = LayananJumlahPasienRanap::where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('kode_kelas', $validatedData['kode_kelas'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->kode_kelas = $validatedData['kode_kelas'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data kelas ' . $validatedData['kode_kelas'] . ' berhasil diperbarui');
        }

        return Redirect::to('/pasien-ranap'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananJumlahPasienRanap $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
