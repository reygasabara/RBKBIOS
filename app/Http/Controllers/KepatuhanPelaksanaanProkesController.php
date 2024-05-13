<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StatusPengiriman;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\IktKepatuhanPelaksanaanProkes;

class KepatuhanPelaksanaanProkesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = IktKepatuhanPelaksanaanProkes::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';

        $getStatusPengiriman = StatusPengiriman::where('jenis_data', 'Pertumbuhan Realisasi Pendapatan dari Pengelolaan Aset BLU')->first();
        $lastUpdateStatus =  $getStatusPengiriman['updated_at']->format('Y-m-d');
        $targetDate = Carbon::parse($getStatusPengiriman['pengiriman_selanjutnya'])->subday()->format('Y-m-d');

        $updated = $lastUpdate >= $targetDate || (Carbon::now()->format('Y-m-d') < $targetDate && $lastUpdate == $lastUpdateStatus)? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.pelaksanaan-prokes.index',["datas"=>$datas, 'active'=>['ikt', 'pelaksanaan_prokes'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.pelaksanaan-prokes.form',['active'=>['ikt', 'pelaksanaan_prokes']]);
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
       
        $checkedData = IktKepatuhanPelaksanaanProkes::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->first();
        $status = $checkedData ? 'update' : 'add';

        if ($status == 'add') {
            $data = new IktKepatuhanPelaksanaanProkes();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = IktKepatuhanPelaksanaanProkes::where('tgl_transaksi', $validatedData['tgl_transaksi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/kepatuhan-pelaksanaan-prokes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IktKepatuhanPelaksanaanProkes $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}