<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LayananLabParameter;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahLayananLaboratoriumParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LayananLabParameter::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.jumlah-lab-parameter.index',["datas"=>$datas, 'active'=>['layanan', 'lab_parameter'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-lab-parameter.form',['active'=>['layanan', 'lab_parameter']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'nama_layanan' => 'required|string',
            'jumlah' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);

        $status = 'add';
        $checkedData = LayananLabParameter::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->get();

        foreach($checkedData as $data) {
            if($data['nama_layanan'] == $validatedData['nama_layanan']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new LayananLabParameter();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->nama_layanan = $validatedData['nama_layanan'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data layanan ' . $validatedData['nama_layanan'] . ' berhasil ditambahkan');
        } else {
            $updatedData = LayananLabParameter::where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('nama_layanan', $validatedData['nama_layanan'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->nama_layanan = $validatedData['nama_layanan'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data layanan ' . $validatedData['nama_layanan'] . ' berhasil diperbarui');
        }

        return Redirect::to('/lab-parameter'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananLabParameter $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}