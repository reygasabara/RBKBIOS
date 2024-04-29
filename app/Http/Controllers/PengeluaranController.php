<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $datas = Pengeluaran::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.pengeluaran.index',["datas"=>$datas, 'active'=>['keuangan', 'pengeluaran'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.pengeluaran.form',['active'=>['keuangan', 'pengeluaran']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'kd_akun' => 'required|numeric|regex:/^5\d{5}$/',
            'jumlah' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
            'kd_akun.regex' => 'Kode akun harus terdiri dari 6 digit dan diawali dengan angka 5',
        ]);

        $status = 'add';
        $checkedData = Pengeluaran::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->get();

        foreach($checkedData as $data) {
            if($data['kd_akun'] == $validatedData['kd_akun']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new Pengeluaran();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->kd_akun = $validatedData['kd_akun'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data dengan kode akun ' . $validatedData['kd_akun'] . ' berhasil ditambahkan');
        } else {
            $updatedData = Pengeluaran::where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('kd_akun', $validatedData['kd_akun'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->kd_akun = $validatedData['kd_akun'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data dengan kode akun ' . $validatedData['kd_akun'] . ' berhasil diperbarui');
        }

        return Redirect::to('/pengeluaran'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
