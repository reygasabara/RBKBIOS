<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Notifikasi;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $datas = Penerimaan::orderBy('updated_at', 'DESC')->get();
        $lastUpdate = $datas->count() ? Carbon::parse($datas->first()['updated_at'])->format('Y-m-d') : '2000-01-01';
        $updated = Carbon::today()->toDateString() == $lastUpdate ? true : false;

        $title = 'Menghapus Data!';
        $text = "Apakah Anda yakin ingin menghapus data?";
        confirmDelete($title, $text);

        return view('layers.penerimaan.index',["datas"=>$datas, 'active'=>['keuangan', 'penerimaan'], "lastUpdate"=>$lastUpdate, 'updated' => $updated]);

        // $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
        //     'satker' => env('TOKEN_SATKER'),
        //     'key' => env('TOKEN_KEY')
        // ]);
        // $jsonToken = $getToken->json();
        // $token = $jsonToken['token'];

        // $getData = Http::withHeaders(['token' => $token])->post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/get/data/keuangan/akuntansi/penerimaan');
        // $dataJson = $getData->json();
        // $dataFromJson = $dataJson['data'];
        // $datas = $dataFromJson['datas'];
        
        // usort($datas, function($a, $b) {
        //     return strtotime($a['updated_at']) - strtotime($b['updated_at']);
        // });
            
        // $lastUpdate = end($datas)['updated_at'];
        // $updateDatetime = date("Y-m-d 15:00:00", strtotime("-1 day"));
        // $updateStatus = 'not updated';
        // $notifikasi = []; 

        // if ($lastUpdate >= $updateDatetime) {
        //     $updateStatus = 'updated';
        // } 

        // $filterNotifikasi = Notifikasi::where('submenu', 'Penerimaan')->get();

        // if ($filterNotifikasi->isNotEmpty()) {
        //     foreach ($filterNotifikasi as $data) {
        //         $pesan = '[' . $data['updated_at'] . '] ' . $data['pesan'] . ' pada transaksi tanggal ' . $data['tgl_transaksi'] . ' dengan kode akun ' . $data['keunikan'] . '.';
        //         array_push($notifikasi, $pesan);
        //     }
        //     $updateStatus = 'partially updated';
        // }

        // return view('layers.penerimaan.index',["datas"=>$datas, 'active'=>['keuangan', 'penerimaan'], "updateStatus"=>$updateStatus, "lastUpdate"=>$lastUpdate, 'notifikasi' => $notifikasi, 'updateDatetime' => $updateDatetime, 'savedData' => session('savedData')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layers.penerimaan.form',['active'=>['keuangan', 'penerimaan']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_transaksi' => 'required|date_format:Y-m-d|before_or_equal:today',
            'kd_akun' => 'required|numeric|regex:/^4\d{5}$/',
            'jumlah' => 'required|numeric',
        ], [
            'tgl_transaksi.date_format' => 'Format tanggal harus \'YYYY-MM-DD\'',
            'tgl_transaksi.before_or_equal' => 'Tanggal tidak boleh melebihi hari ini',
            'kd_akun.regex' => 'Kode akun harus terdiri dari 6 digit dan diawali dengan angka 4',
        ]);

        $status = 'add';
        $checkedData = Penerimaan::Where('tgl_transaksi', $validatedData['tgl_transaksi'])->get();

        foreach($checkedData as $data) {
            if($data['kd_akun'] == $validatedData['kd_akun']) {
                $status = 'update';
                break;
            }
        }

        if ($status == 'add') {
            $data = new Penerimaan();
            $data->tgl_transaksi = $validatedData['tgl_transaksi'];
            $data->kd_akun = $validatedData['kd_akun'];
            $data->jumlah = $validatedData['jumlah'];
            $data->save();
            Alert::success('Sukses!', 'Data dengan kode akun ' . $validatedData['kd_akun'] . ' berhasil ditambahkan');
            // toast('Sukses!' . ' Data dengan kode akun ' . $validatedData['kd_akun'] . ' berhasil ditambahkan','success');

        } else {
            $updatedData = Penerimaan::where('tgl_transaksi', $validatedData['tgl_transaksi'])->where('kd_akun', $validatedData['kd_akun'])->firstOrFail();
            $updatedData->tgl_transaksi = $validatedData['tgl_transaksi'];
            $updatedData->kd_akun = $validatedData['kd_akun'];
            $updatedData->jumlah = $validatedData['jumlah'];
            $updatedData->save();
            Alert::success('Sukses!', 'Data dengan kode akun ' . $validatedData['kd_akun'] . ' berhasil diperbarui');
        }

        return Redirect::to('/penerimaan'); 

    //    $getToken = Http::post('https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/token',[
    //     'satker' => env('TOKEN_SATKER'),
    //     'key' => env('TOKEN_KEY')
    //     ]);

    //     $jsonToken = $getToken->json();
    //     $token = $jsonToken['token'];

    //     $response = Http::withHeaders(['token' => $token])->post('Https://' . env('DOMAIN_NAME') . '.kemenkeu.go.id/api/ws/keuangan/akuntansi/penerimaan', $validatedData);

    //     $message = $response->json()['message'];
    //     $errorResponse = $response->json()['error'];

    //     if ($response->successful()) { 
    //         if ($errorResponse) {
    //             $errorLists = [];

    //             foreach ($errorResponse as $fields) {
    //                 foreach ($fields as $error) {
    //                     array_push($errorLists, $error);
    //                 }
    //             }

    //             return redirect()->back()->withErrors($errorLists)->withInput($validatedData)->with('message', $message);  
    //         } else {
    //             $savedData = true;
    //             return Redirect::to('/penerimaan')->with('savedData', $savedData);  
    //         }
    //     } else {
    //         $errorLists = [];

    //         foreach ($errorResponse as $fields) {
    //             foreach ($fields as $error) {
    //                 array_push($errorLists, $error);
    //             }
    //         }

    //         return redirect()->back()->withErrors($errorLists)->withInput($validatedData)->with('message', $message);  
    //     }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerimaan $id)
    {
        $id->delete();
        alert()->success('Sukses!','Data berhasil dihapus!');
        return redirect()->back();
    }
}
