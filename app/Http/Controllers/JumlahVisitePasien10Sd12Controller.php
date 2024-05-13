<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\IktVisite10Sampai12;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahVisitePasien10Sd12Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = IktVisite10Sampai12::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.visite-sepuluh-duabelas.index',["datas"=>$datas, 'active'=>['ikt', 'visite_sepuluh_duabelas'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.visite-sepuluh-duabelas.form',['active'=>['ikt', 'visite_sepuluh_duabelas']]);
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
       
        $checkedData = IktVisite10Sampai12::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->first();
        $status = $checkedData ? 'update' : 'add';

        if ($status == 'add') {
            $data = new IktVisite10Sampai12();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = IktVisite10Sampai12::where('tgl_transaksi', $validatedData['tgl_transaksi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/visite-sepuluh-duabelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IktVisite10Sampai12 $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}