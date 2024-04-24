<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SaldoPengelolaanKas;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class SaldoRekeningPengelolaanKasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SaldoPengelolaanKas::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.saldo-pengelolaan-kas.index',["datas"=>$datas, 'active'=>['keuangan', 'pengelolaan_kas'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.saldo-pengelolaan-kas.form',['active'=>['keuangan', 'pengelolaan_kas']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'no_bilyet' => 'required|string',
            'nilai_deposito' => 'required|numeric',
            'nilai_bunga' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);

        $status = 'add';
        $checkedData = SaldoPengelolaanKas::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->get();

        foreach($checkedData as $data) {
            if($data['no_bilyet'] == $validatedData['no_bilyet']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new SaldoPengelolaanKas();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->no_bilyet = $validatedData['no_bilyet'];
            $data->nilai_deposito = $validatedData['nilai_deposito'];
            $data->nilai_bunga = $validatedData['nilai_bunga'];
            $data->save();
            Alert::success('Sukses!', 'Data dengan no. bilyet ' . $validatedData['no_bilyet'] . ' berhasil ditambahkan');
        } else {
            $updatedData = SaldoPengelolaanKas::where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('no_bilyet', $validatedData['no_bilyet'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->no_bilyet = $validatedData['no_bilyet'];
            $updatedData->nilai_deposito = $validatedData['nilai_deposito'];
            $updatedData->nilai_bunga = $validatedData['nilai_bunga'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data dengan no. bilyet ' . $validatedData['no_bilyet'] . ' berhasil diperbarui');
        }

        return Redirect::to('/saldo-pengelolaan-kas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaldoPengelolaanKas $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
