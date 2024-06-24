<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SaldoOperasional;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class SaldoRekeningOperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SaldoOperasional::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.saldo-operasional.index',["datas"=>$datas, 'active'=>['keuangan', 'operasional'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.saldo-operasional.form',['active'=>['keuangan', 'operasional']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['jumlah'] = str_replace('.', '', $request['jumlah']);
        $request['jumlah'] =intval($request['jumlah']);
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'kdbank' => 'required|numeric|in:002,008,009,011,013,014,016,019,022,026,028,031,032,037,040,041,042,045,046,048,050,067,089,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,147,153,200,213,330,422,426,427,441,451,484,494,506,517,521,547,553,555,601,773,781,949,950,990,201|regex:/^\d{3}$/',
            'no_rekening' => 'required|numeric',
            'unit' => 'required|string',
            'saldo_akhir' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
            'kdbank.in' => 'Kode bank tidak diketahui',
            'regex' => 'Kode bank harus terdiri dari 3 digit angka'
        ]);

        $status = 'add';
        $checkedData = SaldoOperasional::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->get();

        foreach($checkedData as $data) {
            if($data['no_rekening'] == $validatedData['no_rekening']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new SaldoOperasional();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->kdbank = $validatedData['kdbank'];
            $data->no_rekening = $validatedData['no_rekening'];
            $data->unit = $validatedData['unit'];
            $data->saldo_akhir = $validatedData['saldo_akhir'];
            $data->save();
            Alert::success('Sukses!', 'Data dengan no. rekening ' . $validatedData['no_rekening'] . ' berhasil ditambahkan');
        } else {
            $updatedData = SaldoOperasional::where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('no_rekening', $validatedData['no_rekening'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->kdbank = $validatedData['kdbank'];
            $updatedData->no_rekening = $validatedData['no_rekening'];
            $updatedData->unit = $validatedData['unit'];
            $updatedData->saldo_akhir = $validatedData['saldo_akhir'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data dengan no. rekening ' . $validatedData['no_rekening'] . ' berhasil diperbarui');
        }

        return Redirect::to('/saldo-operasional');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaldoOperasional $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
