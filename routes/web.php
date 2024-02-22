<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BORController;
use App\Http\Controllers\JumlahAhliGiziController;
use App\Http\Controllers\JumlahApotekerController;
use App\Http\Controllers\JumlahDokterGigiController;
use App\Http\Controllers\JumlahDokterUmumController;
use App\Http\Controllers\JumlahSanitarianController;
use App\Http\Controllers\JumlahRadiograferController;
use App\Http\Controllers\JumlahTenagaBidanController;
use App\Http\Controllers\JumlahFisioterapisController;
use App\Http\Controllers\JumlahTenagaPerawatController;
use App\Http\Controllers\JumlahLayananFarmasiController;
use App\Http\Controllers\JumlahTenagaNonMedisController;
use App\Http\Controllers\JumlahDokterSpesialisController;
use App\Http\Controllers\JumlahLayananForensikController;
use App\Http\Controllers\JumlahPasienRawatInapController;
use App\Http\Controllers\JumlahTindakanOperasiController;
use App\Http\Controllers\JumlahLayananRadiologiController;
use App\Http\Controllers\JumlahPasienRawatDaruratController;
use App\Http\Controllers\JumlahKunjunganRawatJalanController;
use App\Http\Controllers\JumlahPranataLaboratoriumController;
use App\Http\Controllers\JumlahPasienBPJSdanNonBPJSController;
use App\Http\Controllers\JumlahPasienRawatJalanPoliController;
use App\Http\Controllers\JumlahTenagaProfesionalLainnyaController;
use App\Http\Controllers\JumlahLayananLaboratoriumSampelController;
use App\Http\Controllers\JumlahTenagaNonMedisAdministrasiController;
use App\Http\Controllers\JumlahLayananLaboratoriumParameterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/perawat', [JumlahTenagaPerawatController::class, 'index']);
Route::get('/perawat/input', [JumlahTenagaPerawatController::class, 'create']);
Route::post('/perawat/submit', [JumlahTenagaPerawatController::class, 'store']);
Route::get('/bidan', [JumlahTenagaBidanController::class, 'index']);
Route::get('/bidan/input', [JumlahTenagaBidanController::class, 'create']);
Route::post('/bidan/submit', [JumlahTenagaBidanController::class, 'store']);
Route::get('/dokter-spesialis', [JumlahDokterSpesialisController::class, 'index']);
Route::get('/dokter-spesialis/input', [JumlahDokterSpesialisController::class, 'create']);
Route::post('/dokter-spesialis/submit', [JumlahDokterSpesialisController::class, 'store']);
Route::get('/dokter-gigi', [JumlahDokterGigiController::class, 'index']);
Route::get('/dokter-gigi/input', [JumlahDokterGigiController::class, 'create']);
Route::post('/dokter-gigi/submit', [JumlahDokterGigiController::class, 'store']);
Route::get('/dokter-umum', [JumlahDokterUmumController::class, 'index']);
Route::get('/dokter-umum/input', [JumlahDokterUmumController::class, 'create']);
Route::post('/dokter-umum/submit', [JumlahDokterUmumController::class, 'store']);
Route::get('/pranata-laboratorium', [JumlahPranataLaboratoriumController::class, 'index']);
Route::get('/pranata-laboratorium/input', [JumlahPranataLaboratoriumController::class, 'create']);
Route::post('/pranata-laboratorium/submit', [JumlahPranataLaboratoriumController::class, 'store']);
Route::get('/radiografer', [JumlahRadiograferController::class, 'index']);
Route::get('/radiografer/input', [JumlahRadiograferController::class, 'create']);
Route::post('/radiografer/submit', [JumlahRadiograferController::class, 'store']);
Route::get('/ahli-gizi', [JumlahAhliGiziController::class, 'index']);
Route::get('/ahli-gizi/input', [JumlahAhliGiziController::class, 'create']);
Route::post('/ahli-gizi/submit', [JumlahAhliGiziController::class, 'store']);
Route::get('/fisioterapis', [JumlahFisioterapisController::class, 'index']);
Route::get('/fisioterapis/input', [JumlahFisioterapisController::class, 'create']);
Route::post('/fisioterapis/submit', [JumlahFisioterapisController::class, 'store']);
Route::get('/apoteker', [JumlahApotekerController::class, 'index']);
Route::get('/apoteker/input', [JumlahApotekerController::class, 'create']);
Route::post('/apoteker/submit', [JumlahApotekerController::class, 'store']);
Route::get('/profesional-lainnya', [JumlahTenagaProfesionalLainnyaController::class, 'index']);
Route::get('/profesional-lainnya/input', [JumlahTenagaProfesionalLainnyaController::class, 'create']);
Route::post('/profesional-lainnya/submit', [JumlahTenagaProfesionalLainnyaController::class, 'store']);
Route::get('/non-medis', [JumlahTenagaNonMedisController::class, 'index']);
Route::get('/non-medis/input', [JumlahTenagaNonMedisController::class, 'create']);
Route::post('/non-medis/submit', [JumlahTenagaNonMedisController::class, 'store']);
Route::get('/non-medis-administrasi', [JumlahTenagaNonMedisAdministrasiController::class, 'index']);
Route::get('/non-medis-administrasi/input', [JumlahTenagaNonMedisAdministrasiController::class, 'create']);
Route::post('/non-medis-administrasi/submit', [JumlahTenagaNonMedisAdministrasiController::class, 'store']);
Route::get('/sanitarian', [JumlahSanitarianController::class, 'index']);
Route::get('/sanitarian/input', [JumlahSanitarianController::class, 'create']);
Route::post('/sanitarian/submit', [JumlahSanitarianController::class, 'store']);

Route::get('/pasien-ranap', [JumlahPasienRawatInapController::class, 'index']);
Route::get('/pasien-ranap/input', [JumlahPasienRawatInapController::class, 'create']);
Route::post('/pasien-ranap/submit', [JumlahPasienRawatInapController::class, 'store']);
Route::get('/pasien-igd', [JumlahPasienRawatDaruratController::class, 'index']);
Route::get('/pasien-igd/input', [JumlahPasienRawatDaruratController::class, 'create']);
Route::post('/pasien-igd/submit', [JumlahPasienRawatDaruratController::class, 'store']);
Route::get('/lab-sampel', [JumlahLayananLaboratoriumSampelController::class, 'index']);
Route::get('/lab-sampel/input', [JumlahLayananLaboratoriumSampelController::class, 'create']);
Route::post('/lab-sampel/submit', [JumlahLayananLaboratoriumSampelController::class, 'store']);
Route::get('/lab-parameter', [JumlahLayananLaboratoriumParameterController::class, 'index']);
Route::get('/lab-parameter/input', [JumlahLayananLaboratoriumParameterController::class, 'create']);
Route::post('/lab-parameter/submit', [JumlahLayananLaboratoriumParameterController::class, 'store']);
Route::get('/tindakan-operasi', [JumlahTindakanOperasiController::class, 'index']);
Route::get('/tindakan-operasi/input', [JumlahTindakanOperasiController::class, 'create']);
Route::post('/tindakan-operasi/submit', [JumlahTindakanOperasiController::class, 'store']);
Route::get('/layanan-radiologi', [JumlahLayananRadiologiController::class, 'index']);
Route::get('/layanan-radiologi/input', [JumlahLayananRadiologiController::class, 'create']);
Route::post('/layanan-radiologi/submit', [JumlahLayananRadiologiController::class, 'store']);
Route::get('/layanan-forensik', [JumlahLayananForensikController::class, 'index']);
Route::get('/layanan-forensik/input', [JumlahLayananForensikController::class, 'create']);
Route::post('/layanan-forensik/submit', [JumlahLayananForensikController::class, 'store']);
Route::get('/kunjungan-ralan', [JumlahKunjunganRawatJalanController::class, 'index']);
Route::get('/kunjungan-ralan/input', [JumlahKunjunganRawatJalanController::class, 'create']);
Route::post('/kunjungan-ralan/submit', [JumlahKunjunganRawatJalanController::class, 'store']);
Route::get('/pasien-ralan-poli', [JumlahPasienRawatJalanPoliController::class, 'index']);
Route::get('/pasien-ralan-poli/input', [JumlahPasienRawatJalanPoliController::class, 'create']);
Route::post('/pasien-ralan-poli/submit', [JumlahPasienRawatJalanPoliController::class, 'store']);
Route::get('/pasien-bpjs-nonbpjs', [JumlahPasienBPJSdanNonBPJSController::class, 'index']);
Route::get('/pasien-bpjs-nonbpjs/input', [JumlahPasienBPJSdanNonBPJSController::class, 'create']);
Route::post('/pasien-bpjs-nonbpjs/submit', [JumlahPasienBPJSdanNonBPJSController::class, 'store']);
Route::get('/layanan-farmasi', [JumlahLayananFarmasiController::class, 'index']);
Route::get('/layanan-farmasi/input', [JumlahLayananFarmasiController::class, 'create']);
Route::post('/layanan-farmasi/submit', [JumlahLayananFarmasiController::class, 'store']);
Route::get('/bor', [BORController::class, 'index']);
Route::get('/bor/input', [BORController::class, 'create']);
Route::post('/bor/submit', [BORController::class, 'store']);