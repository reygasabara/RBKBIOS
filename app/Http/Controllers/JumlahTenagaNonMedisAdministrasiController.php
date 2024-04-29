<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StatusPengiriman;
use App\Models\SdmNonMedisAdministrasi;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahTenagaNonMedisAdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = SdmNonMedisAdministrasi::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';

        $getStatusPengiriman = StatusPengiriman::where('jenis_data', 'Jumlah Tenaga Non-Medis Administrasi')->first();
        $lastUpdateStatus = $getStatusPengiriman['updated_at']->format('Y-m-d');
        $targetDate = Carbon::parse($getStatusPengiriman['pengiriman_selanjutnya'])->subday()->format('Y-m-d');

        $updated = $lastUpdate >= $targetDate || (Carbon::now()->format('Y-m-d') < $targetDate && $lastUpdate == $lastUpdateStatus)? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.jumlah-non-medis-administrasi.index',["datas"=>$datas, 'active'=>['sdm', 'non_medis_adm'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-non-medis-administrasi.form',['active'=>['sdm', 'non_medis_adm']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'pns' => 'required|numeric',
            'pppk' => 'required|numeric',
            'anggota' => 'required|numeric',
            'non_pns_tetap' => 'required|numeric',
            'kontrak' => 'required|numeric',
            'keterangan' => 'required|string'
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);
        $status = 'add';
        $checkedData = SdmNonMedisAdministrasi::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('keterangan', $validatedData['keterangan'])->get();

        foreach ($checkedData as $data) {
            if($data['keterangan'] == $validatedData['keterangan']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new SdmNonMedisAdministrasi();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->pns = $validatedData['pns'];
            $data->pppk = $validatedData['pppk'];
            $data->anggota = $validatedData['anggota'];
            $data->non_pns_tetap = $validatedData['non_pns_tetap'];
            $data->kontrak = $validatedData['kontrak'];
            $data->keterangan = $validatedData['keterangan'];
            $data->save();
            Alert::success('Sukses!', 'Data ' . $validatedData['keterangan'] . ' pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = SdmNonMedisAdministrasi::where('tgl_transaksi', $validatedData['tgl_transaksi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->pns = $validatedData['pns'];
            $updatedData->pppk = $validatedData['pppk'];
            $updatedData->anggota = $validatedData['anggota'];
            $updatedData->non_pns_tetap = $validatedData['non_pns_tetap'];
            $updatedData->kontrak = $validatedData['kontrak'];
            $updatedData->keterangan = $validatedData['keterangan'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data ' . $validatedData['keterangan'] . ' pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/non-medis-administrasi');   
    }

   /**
     * Remove the specified resource from storage.
     */
    public function destroy(SdmNonMedisAdministrasi $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
