<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\LayananDokpol;
use App\Models\StatusPengiriman;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class JumlahPelayananDokpolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LayananDokpol::orderBy('updated_at', 'desc')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';

        $getStatusPengiriman = StatusPengiriman::where('jenis_data', 'Jumlah Pelayanan Dokpol')->first();
        $lastUpdateStatus =  $getStatusPengiriman['updated_at']->format('Y-m-d');
        $targetDate = Carbon::parse($getStatusPengiriman['pengiriman_selanjutnya'])->subday()->format('Y-m-d');

        $updated = $lastUpdate >= $targetDate || (Carbon::now()->format('Y-m-d') < $targetDate && $lastUpdate == $lastUpdateStatus)? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.jumlah-layanan-dokpol.index',["datas"=>$datas, 'active'=>['layanan', 'dokpol'], "updated"=>$updated, "lastUpdate"=>$lastUpdate]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.jumlah-layanan-dokpol.form',['active'=>['layanan', 'dokpol']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'kedokteran_forensik' => 'required|numeric',
            'psikiatri_forensik' => 'required|numeric',
            'sentra_visum_dan_medikolegal' => 'required|numeric',
            'ppat' => 'required|numeric',
            'odontologi_forensik' => 'required|numeric',
            'psikologi_forensik' => 'required|numeric',
            'antropologi_forensik' => 'required|numeric',
            'olah_tkp_medis' => 'required|numeric',
            'kesehatan_tahanan' => 'required|numeric',
            'narkoba' => 'required|numeric',
            'toksikologi_medik' => 'required|numeric',
            'pelayanan_dna' => 'required|numeric',
            'pam_keslap_food_security' => 'required|numeric',
            'dvi' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
        ]);
       
        $checkedData = LayananDokpol::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->first();
        $status = $checkedData ? 'update' : 'add';

        if ($status == 'add') {
            $data = new LayananDokpol();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->kedokteran_forensik = $validatedData['kedokteran_forensik'];
            $data->psikiatri_forensik = $validatedData['psikiatri_forensik'];
            $data->sentra_visum_dan_medikolegal = $validatedData['sentra_visum_dan_medikolegal'];
            $data->ppat = $validatedData['ppat'];
            $data->odontologi_forensik = $validatedData['odontologi_forensik'];
            $data->psikologi_forensik = $validatedData['psikologi_forensik'];
            $data->antropologi_forensik = $validatedData['antropologi_forensik'];
            $data->olah_tkp_medis = $validatedData['olah_tkp_medis'];
            $data->kesehatan_tahanan = $validatedData['kesehatan_tahanan'];
            $data->narkoba = $validatedData['narkoba'];
            $data->toksikologi_medik = $validatedData['toksikologi_medik'];
            $data->pelayanan_dna = $validatedData['pelayanan_dna'];
            $data->pam_keslap_food_security = $validatedData['pam_keslap_food_security'];
            $data->dvi = $validatedData['dvi'];
            $data->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil ditambahkan');
        } else {
            $updatedData = LayananDokpol::where('tgl_transaksi', $validatedData['tgl_transaksi'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->kedokteran_forensik = $validatedData['kedokteran_forensik'];
            $updatedData->psikiatri_forensik = $validatedData['psikiatri_forensik'];
            $updatedData->sentra_visum_dan_medikolegal = $validatedData['sentra_visum_dan_medikolegal'];
            $updatedData->ppat = $validatedData['ppat'];
            $updatedData->odontologi_forensik = $validatedData['odontologi_forensik'];
            $updatedData->psikologi_forensik = $validatedData['psikologi_forensik'];
            $updatedData->antropologi_forensik = $validatedData['antropologi_forensik'];
            $updatedData->olah_tkp_medis = $validatedData['olah_tkp_medis'];
            $updatedData->kesehatan_tahanan = $validatedData['kesehatan_tahanan'];
            $updatedData->narkoba = $validatedData['narkoba'];
            $updatedData->toksikologi_medik = $validatedData['toksikologi_medik'];
            $updatedData->pelayanan_dna = $validatedData['pelayanan_dna'];
            $updatedData->pam_keslap_food_security = $validatedData['pam_keslap_food_security'];
            $updatedData->dvi = $validatedData['dvi'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data pada tanggal transaksi ' . $validatedData['tgl_transaksi'] . ' berhasil diperbarui');
        }

        return Redirect::to('/dokpol');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananDokpol $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}