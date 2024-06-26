<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BORController;
use App\Http\Controllers\BTOController;
use App\Http\Controllers\TOIController;
use App\Http\Controllers\ALOSController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RasioPOBOController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\JumlahAhliGiziController;
use App\Http\Controllers\JumlahApotekerController;
use App\Http\Controllers\KepuasanPasienController;
use App\Http\Controllers\JumlahDokterGigiController;
use App\Http\Controllers\JumlahDokterUmumController;
use App\Http\Controllers\JumlahSanitarianController;
use App\Http\Controllers\StatusPengirimanController;
use App\Http\Controllers\JumlahRadiograferController;
use App\Http\Controllers\JumlahTenagaBidanController;
use App\Http\Controllers\LogPengirimanDataController;
use App\Http\Controllers\JumlahFisioterapisController;
use App\Http\Controllers\penyelenggaraanRMEController;
use App\Http\Controllers\JumlahTenagaPerawatController;
use App\Http\Controllers\KepatuhanAlurKlinisController;
use App\Http\Controllers\JumlahLayananFarmasiController;
use App\Http\Controllers\JumlahTenagaNonMedisController;
use App\Http\Controllers\JumlahDokterSpesialisController;
use App\Http\Controllers\JumlahDPJPTidakVisiteController;
use App\Http\Controllers\JumlahLayananForensikController;
use App\Http\Controllers\JumlahPasienRawatInapController;
use App\Http\Controllers\JumlahPelayananDokpolController;
use App\Http\Controllers\JumlahTindakanOperasiController;
use App\Http\Controllers\WaktuTungguRawatJalanController;
use App\Http\Controllers\JumlahLayananRadiologiController;
use App\Http\Controllers\KepatuhanPenggunaanAPDController;
use App\Http\Controllers\PelaporanHasilKritisLabController;
use App\Http\Controllers\PenundaanOperasiElektifController;
use App\Http\Controllers\IndeksKepuasanMasyarakatController;
use App\Http\Controllers\JumlahPasienRawatDaruratController;
use App\Http\Controllers\JumlahVisitePasien10Sd12Controller;
use App\Http\Controllers\KepatuhanWaktuVisiteDPJPController;
use App\Http\Controllers\SaldoRekeningOperasionalController;
use App\Http\Controllers\JumlahKunjunganRawatJalanController;
use App\Http\Controllers\JumlahPranataLaboratoriumController;
use App\Http\Controllers\KepatuhanKebersihanTanganController;
use App\Http\Controllers\PembelianAlkesDalamNegeriController;
use App\Http\Controllers\SaldoRekeningDanaKelolaanController;
use App\Http\Controllers\JumlahPasienBPJSdanNonBPJSController;
use App\Http\Controllers\JumlahPasienRawatJalanPoliController;
use App\Http\Controllers\KepatuhanPelaksanaanProkesController;
use App\Http\Controllers\KepatuhanWaktuVisiteDokterController;
use App\Http\Controllers\KepatuhanIdentifikasiPasienController;
use App\Http\Controllers\SaldoRekeningPengelolaanKasController;
use App\Http\Controllers\JumlahVisitePasienDiatasJam12Controller;
use App\Http\Controllers\KecepatanWaktuTanggapKomplainController;
use App\Http\Controllers\JumlahTenagaProfesionalLainnyaController;
use App\Http\Controllers\JumlahVisitePasienDibawahJam10Controller;
use App\Http\Controllers\JumlahLayananLaboratoriumSampelController;
use App\Http\Controllers\JumlahTenagaNonMedisAdministrasiController;
use App\Http\Controllers\JumlahKegiatanVisitePasienPertamaController;
use App\Http\Controllers\JumlahLayananLaboratoriumParameterController;
use App\Http\Controllers\KepatuhanPencegahanResikoPasienJatuhController;
use App\Http\Controllers\KepatuhanPenggunaanFormulariumNasionalController;
use App\Http\Controllers\WaktuTanggapOperasiSeksioSesareaEmergensiController;
use App\Http\Controllers\PertumbuhanRealisasiPendapatanDariPengelolaanAsetBLUController;

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

// ROUTE BACKEND
Route::middleware(['guest'])->group(function() {
   Route::get('/login', [AuthController::class, 'index'])->name('login');
   Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::middleware(['auth', 'web'])->group(function () {
   Route::get('/', [IndexController::class, 'index']);

   Route::middleware(['role:Super Admin'])->group(function () {
      Route::post('/run-command', [SchedulerController::class, 'runCommand']);

      Route::get('/monitoring/log-pengiriman', [LogPengirimanDataController::class, 'index']);
      Route::get('/monitoring/status-pengiriman', [StatusPengirimanController::class, 'index']);

      Route::resource('/user', UserController::class);
      Route::resource('/roles', RoleController::class);
   });

   Route::middleware(['permission:edit penerimaan'])->group(function () {
      Route::get('/penerimaan', [PenerimaanController::class, 'index']);
      Route::get('/penerimaan/input', [PenerimaanController::class, 'create']);
      Route::post('/penerimaan/submit', [PenerimaanController::class, 'store']);
      Route::delete('/penerimaan/delete/{id}', [PenerimaanController::class, 'destroy']);
   });

   Route::middleware(['permission:edit pengeluaran'])->group(function () {
      Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
      Route::get('/pengeluaran/input', [PengeluaranController::class, 'create']);
      Route::post('/pengeluaran/submit', [PengeluaranController::class, 'store']);
      Route::delete('/pengeluaran/delete/{id}', [PengeluaranController::class, 'destroy']);
   });

   Route::middleware(['permission:edit saldo - operasional'])->group(function () {
      Route::get('/saldo-operasional', [SaldoRekeningOperasionalController::class, 'index']);
      Route::get('/saldo-operasional/input', [SaldoRekeningOperasionalController::class, 'create']);
      Route::post('/saldo-operasional/submit', [SaldoRekeningOperasionalController::class, 'store']);
      Route::delete('/saldo-operasional/delete/{id}', [SaldoRekeningOperasionalController::class, 'destroy']);
   });

   Route::middleware(['permission:edit saldo - pengelolaan kas'])->group(function () {
      Route::get('/saldo-pengelolaan-kas', [SaldoRekeningPengelolaanKasController::class, 'index']);
      Route::get('/saldo-pengelolaan-kas/input', [SaldoRekeningPengelolaanKasController::class, 'create']);
      Route::post('/saldo-pengelolaan-kas/submit', [SaldoRekeningPengelolaanKasController::class, 'store']);
      Route::delete('/saldo-pengelolaan-kas/delete/{id}', [SaldoRekeningPengelolaanKasController::class, 'destroy']);
   });

   Route::middleware(['permission:edit saldo - dana kelolaan'])->group(function () {
      Route::get('/saldo-dana-kelolaan', [SaldoRekeningDanaKelolaanController::class, 'index']);
      Route::get('/saldo-dana-kelolaan/input', [SaldoRekeningDanaKelolaanController::class, 'create']);
      Route::post('/saldo-dana-kelolaan/submit', [SaldoRekeningDanaKelolaanController::class, 'store']);
      Route::delete('/saldo-dana-kelolaan/delete/{id}', [SaldoRekeningDanaKelolaanController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah dokter spesialis'])->group(function () {
      Route::get('/dokter-spesialis', [JumlahDokterSpesialisController::class, 'index']);
      Route::get('/dokter-spesialis/input', [JumlahDokterSpesialisController::class, 'create']);
      Route::post('/dokter-spesialis/submit', [JumlahDokterSpesialisController::class, 'store']);
      Route::delete('/dokter-spesialis/delete/{id}', [JumlahDokterSpesialisController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah dokter gigi'])->group(function () {
      Route::get('/dokter-gigi', [JumlahDokterGigiController::class, 'index']);
      Route::get('/dokter-gigi/input', [JumlahDokterGigiController::class, 'create']);
      Route::post('/dokter-gigi/submit', [JumlahDokterGigiController::class, 'store']);
      Route::delete('/dokter-gigi/delete/{id}', [JumlahDokterGigiController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah dokter umum'])->group(function () {
      Route::get('/dokter-umum', [JumlahDokterUmumController::class, 'index']);
      Route::get('/dokter-umum/input', [JumlahDokterUmumController::class, 'create']);
      Route::post('/dokter-umum/submit', [JumlahDokterUmumController::class, 'store']);
      Route::delete('/dokter-umum/delete/{id}', [JumlahDokterUmumController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah tenaga perawat'])->group(function () {
      Route::get('/perawat', [JumlahTenagaPerawatController::class, 'index']);
      Route::get('/perawat/input', [JumlahTenagaPerawatController::class, 'create']);
      Route::post('/perawat/submit', [JumlahTenagaPerawatController::class, 'store']);
      Route::delete('/perawat/delete/{id}', [JumlahTenagaPerawatController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah tenaga bidan'])->group(function () {
      Route::get('/bidan', [JumlahTenagaBidanController::class, 'index']);
      Route::get('/bidan/input', [JumlahTenagaBidanController::class, 'create']);
      Route::post('/bidan/submit', [JumlahTenagaBidanController::class, 'store']);
      Route::delete('/bidan/delete/{id}', [JumlahTenagaBidanController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah pranata laboratorium'])->group(function () {
      Route::get('/pranata-laboratorium', [JumlahPranataLaboratoriumController::class, 'index']);
      Route::get('/pranata-laboratorium/input', [JumlahPranataLaboratoriumController::class, 'create']);
      Route::post('/pranata-laboratorium/submit', [JumlahPranataLaboratoriumController::class, 'store']);
      Route::delete('/pranata-laboratorium/delete/{id}', [JumlahPranataLaboratoriumController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah radiografer'])->group(function () {
      Route::get('/radiografer', [JumlahRadiograferController::class, 'index']);
      Route::get('/radiografer/input', [JumlahRadiograferController::class, 'create']);
      Route::post('/radiografer/submit', [JumlahRadiograferController::class, 'store']);
      Route::delete('/radiografer/delete/{id}', [JumlahRadiograferController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah ahli gizi'])->group(function () {
      Route::get('/ahli-gizi', [JumlahAhliGiziController::class, 'index']);
      Route::get('/ahli-gizi/input', [JumlahAhliGiziController::class, 'create']);
      Route::post('/ahli-gizi/submit', [JumlahAhliGiziController::class, 'store']);
      Route::delete('/ahli-gizi/delete/{id}', [JumlahAhliGiziController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah fisioterapis'])->group(function () {
      Route::get('/fisioterapis', [JumlahFisioterapisController::class, 'index']);
      Route::get('/fisioterapis/input', [JumlahFisioterapisController::class, 'create']);
      Route::post('/fisioterapis/submit', [JumlahFisioterapisController::class, 'store']);
      Route::delete('/fisioterapis/delete/{id}', [JumlahFisioterapisController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah apoteker'])->group(function () {
      Route::get('/apoteker', [JumlahApotekerController::class, 'index']);
      Route::get('/apoteker/input', [JumlahApotekerController::class, 'create']);
      Route::post('/apoteker/submit', [JumlahApotekerController::class, 'store']);
      Route::delete('/apoteker/delete/{id}', [JumlahApotekerController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah tenaga profesional lainnya'])->group(function () {
      Route::get('/profesional-lainnya', [JumlahTenagaProfesionalLainnyaController::class, 'index']);
      Route::get('/profesional-lainnya/input', [JumlahTenagaProfesionalLainnyaController::class, 'create']);
      Route::post('/profesional-lainnya/submit', [JumlahTenagaProfesionalLainnyaController::class, 'store']);
      Route::delete('/profesional-lainnya/delete/{id}', [JumlahTenagaProfesionalLainnyaController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah tenaga non-medis'])->group(function () {
      Route::get('/non-medis', [JumlahTenagaNonMedisController::class, 'index']);
      Route::get('/non-medis/input', [JumlahTenagaNonMedisController::class, 'create']);
      Route::post('/non-medis/submit', [JumlahTenagaNonMedisController::class, 'store']);
      Route::delete('/non-medis/delete/{id}', [JumlahTenagaNonMedisController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah tenaga non-medis administrasi'])->group(function () {
      Route::get('/non-medis-administrasi', [JumlahTenagaNonMedisAdministrasiController::class, 'index']);
      Route::get('/non-medis-administrasi/input', [JumlahTenagaNonMedisAdministrasiController::class, 'create']);
      Route::post('/non-medis-administrasi/submit', [JumlahTenagaNonMedisAdministrasiController::class, 'store']);
      Route::delete('/non-medis-administrasi/delete/{id}', [JumlahTenagaNonMedisAdministrasiController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah sanitarian'])->group(function () {
      Route::get('/sanitarian', [JumlahSanitarianController::class, 'index']);
      Route::get('/sanitarian/input', [JumlahSanitarianController::class, 'create']);
      Route::post('/sanitarian/submit', [JumlahSanitarianController::class, 'store']);
      Route::delete('/sanitarian/delete/{id}', [JumlahSanitarianController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah pasien rawat inap'])->group(function () {
      Route::get('/pasien-ranap', [JumlahPasienRawatInapController::class, 'index']);
      Route::get('/pasien-ranap/input', [JumlahPasienRawatInapController::class, 'create']);
      Route::post('/pasien-ranap/submit', [JumlahPasienRawatInapController::class, 'store']);
      Route::delete('/pasien-ranap/delete/{id}', [JumlahPasienRawatInapController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah pasien rawat darurat'])->group(function () {
      Route::get('/pasien-igd', [JumlahPasienRawatDaruratController::class, 'index']);
      Route::get('/pasien-igd/input', [JumlahPasienRawatDaruratController::class, 'create']);
      Route::post('/pasien-igd/submit', [JumlahPasienRawatDaruratController::class, 'store']);
      Route::delete('/pasien-igd/delete/{id}', [JumlahPasienRawatDaruratController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah layanan laboratorium (sampel)'])->group(function () {
      Route::get('/lab-sampel', [JumlahLayananLaboratoriumSampelController::class, 'index']);
      Route::get('/lab-sampel/input', [JumlahLayananLaboratoriumSampelController::class, 'create']);
      Route::post('/lab-sampel/submit', [JumlahLayananLaboratoriumSampelController::class, 'store']);
      Route::delete('/lab-sampel/delete/{id}', [JumlahLayananLaboratoriumSampelController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah layanan laboratorium (parameter)'])->group(function () {
      Route::get('/lab-parameter', [JumlahLayananLaboratoriumParameterController::class, 'index']);
      Route::get('/lab-parameter/input', [JumlahLayananLaboratoriumParameterController::class, 'create']);
      Route::post('/lab-parameter/submit', [JumlahLayananLaboratoriumParameterController::class, 'store']);
      Route::delete('/lab-parameter/delete/{id}', [JumlahLayananLaboratoriumParameterController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah tindakan operasi'])->group(function () {
      Route::get('/tindakan-operasi', [JumlahTindakanOperasiController::class, 'index']);
      Route::get('/tindakan-operasi/input', [JumlahTindakanOperasiController::class, 'create']);
      Route::post('/tindakan-operasi/submit', [JumlahTindakanOperasiController::class, 'store']);
      Route::delete('/tindakan-operasi/delete/{id}', [JumlahTindakanOperasiController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah layanan radiologi'])->group(function () {
      Route::get('/layanan-radiologi', [JumlahLayananRadiologiController::class, 'index']);
      Route::get('/layanan-radiologi/input', [JumlahLayananRadiologiController::class, 'create']);
      Route::post('/layanan-radiologi/submit', [JumlahLayananRadiologiController::class, 'store']);
      Route::delete('/layanan-radiologi/delete/{id}', [JumlahLayananRadiologiController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah layanan forensik'])->group(function () {
      Route::get('/layanan-forensik', [JumlahLayananForensikController::class, 'index']);
      Route::get('/layanan-forensik/input', [JumlahLayananForensikController::class, 'create']);
      Route::post('/layanan-forensik/submit', [JumlahLayananForensikController::class, 'store']);
      Route::delete('/layanan-forensik/delete/{id}', [JumlahLayananForensikController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah kunjungan rawat jalan'])->group(function () {
      Route::get('/kunjungan-ralan', [JumlahKunjunganRawatJalanController::class, 'index']);
      Route::get('/kunjungan-ralan/input', [JumlahKunjunganRawatJalanController::class, 'create']);
      Route::post('/kunjungan-ralan/submit', [JumlahKunjunganRawatJalanController::class, 'store']);
      Route::delete('/kunjungan-ralan/delete/{id}', [JumlahKunjunganRawatJalanController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah pasien rawat jalan/poli'])->group(function () {
      Route::get('/pasien-ralan-poli', [JumlahPasienRawatJalanPoliController::class, 'index']);
      Route::get('/pasien-ralan-poli/input', [JumlahPasienRawatJalanPoliController::class, 'create']);
      Route::post('/pasien-ralan-poli/submit', [JumlahPasienRawatJalanPoliController::class, 'store']);
      Route::delete('/pasien-ralan-poli/delete/{id}', [JumlahPasienRawatJalanPoliController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah pasien BPJS/Non-BPJS'])->group(function () {
      Route::get('/pasien-bpjs-nonbpjs', [JumlahPasienBPJSdanNonBPJSController::class, 'index']);
      Route::get('/pasien-bpjs-nonbpjs/input', [JumlahPasienBPJSdanNonBPJSController::class, 'create']);
      Route::post('/pasien-bpjs-nonbpjs/submit', [JumlahPasienBPJSdanNonBPJSController::class, 'store']);
      Route::delete('/pasien-bpjs-nonbpjs/delete/{id}', [JumlahPasienBPJSdanNonBPJSController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah layanan farmasi'])->group(function () {
      Route::get('/layanan-farmasi', [JumlahLayananFarmasiController::class, 'index']);
      Route::get('/layanan-farmasi/input', [JumlahLayananFarmasiController::class, 'create']);
      Route::post('/layanan-farmasi/submit', [JumlahLayananFarmasiController::class, 'store']);
      Route::delete('/layanan-farmasi/delete/{id}', [JumlahLayananFarmasiController::class, 'destroy']);
   });

   Route::middleware(['permission:edit BOR'])->group(function () {
      Route::get('/bor', [BORController::class, 'index']);
      Route::get('/bor/input', [BORController::class, 'create']);
      Route::post('/bor/submit', [BORController::class, 'store']);
      Route::delete('/bor/delete/{id}', [BORController::class, 'destroy']);
   });

   Route::middleware(['permission:edit TOI'])->group(function () {
      Route::get('/toi', [TOIController::class, 'index']);
      Route::get('/toi/input', [TOIController::class, 'create']);
      Route::post('/toi/submit', [TOIController::class, 'store']);
      Route::delete('/toi/delete/{id}', [TOIController::class, 'destroy']);
   });

   Route::middleware(['permission:edit ALOS'])->group(function () {
      Route::get('/alos', [ALOSController::class, 'index']);
      Route::get('/alos/input', [ALOSController::class, 'create']);
      Route::post('/alos/submit', [ALOSController::class, 'store']);
      Route::delete('/alos/delete/{id}', [ALOSController::class, 'destroy']);
   });

   Route::middleware(['permission:edit BTO'])->group(function () {
      Route::get('/bto', [BTOController::class, 'index']);
      Route::get('/bto/input', [BTOController::class, 'create']);
      Route::post('/bto/submit', [BTOController::class, 'store']);
      Route::delete('/bto/delete/{id}', [BTOController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah pelayanan dokpol'])->group(function () {
      Route::get('/dokpol', [JumlahPelayananDokpolController::class, 'index']);
      Route::get('/dokpol/input', [JumlahPelayananDokpolController::class, 'create']);
      Route::post('/dokpol/submit', [JumlahPelayananDokpolController::class, 'store']);
      Route::delete('/dokpol/delete/{id}', [JumlahPelayananDokpolController::class, 'destroy']);
   });

   Route::middleware(['permission:edit indeks kepuasan masyarakat'])->group(function () {
      Route::get('/ikm', [IndeksKepuasanMasyarakatController::class, 'index']);
      Route::get('/ikm/input', [IndeksKepuasanMasyarakatController::class, 'create']);
      Route::post('/ikm/submit', [IndeksKepuasanMasyarakatController::class, 'store']);
      Route::delete('/ikm/delete/{id}', [IndeksKepuasanMasyarakatController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah visite pasien di bawah jam 10'])->group(function () {
      Route::get('/visite-dibawah-sepuluh', [JumlahVisitePasienDibawahJam10Controller::class, 'index']);
      Route::get('/visite-dibawah-sepuluh/input', [JumlahVisitePasienDibawahJam10Controller::class, 'create']);
      Route::post('/visite-dibawah-sepuluh/submit', [JumlahVisitePasienDibawahJam10Controller::class, 'store']);
      Route::delete('/visite-dibawah-sepuluh/delete/{id}', [JumlahVisitePasienDibawahJam10Controller::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah visite pasien jam 10 s.d 12'])->group(function () {
      Route::get('/visite-sepuluh-duabelas', [JumlahVisitePasien10Sd12Controller::class, 'index']);
      Route::get('/visite-sepuluh-duabelas/input', [JumlahVisitePasien10Sd12Controller::class, 'create']);
      Route::post('/visite-sepuluh-duabelas/submit', [JumlahVisitePasien10Sd12Controller::class, 'store']);
      Route::delete('/visite-sepuluh-duabelas/delete/{id}', [JumlahVisitePasien10Sd12Controller::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah visite pasien di atas jam 12'])->group(function () {
      Route::get('/visite-diatas-duabelas', [JumlahVisitePasienDiatasJam12Controller::class, 'index']);
      Route::get('/visite-diatas-duabelas/input', [JumlahVisitePasienDiatasJam12Controller::class, 'create']);
      Route::post('/visite-diatas-duabelas/submit', [JumlahVisitePasienDiatasJam12Controller::class, 'store']);
      Route::delete('/visite-diatas-duabelas/delete/{id}', [JumlahVisitePasienDiatasJam12Controller::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah DPJP tidak visite'])->group(function () {
      Route::get('/dpjp-non-visite', [JumlahDPJPTidakVisiteController::class, 'index']);
      Route::get('/dpjp-non-visite/input', [JumlahDPJPTidakVisiteController::class, 'create']);
      Route::post('/dpjp-non-visite/submit', [JumlahDPJPTidakVisiteController::class, 'store']);
      Route::delete('/dpjp-non-visite/delete/{id}', [JumlahDPJPTidakVisiteController::class, 'destroy']);
   });

   Route::middleware(['permission:edit jumlah visite pertama'])->group(function () {
      Route::get('/visite-pertama', [JumlahKegiatanVisitePasienPertamaController::class, 'index']);
      Route::get('/visite-pertama/input', [JumlahKegiatanVisitePasienPertamaController::class, 'create']);
      Route::post('/visite-pertama/submit', [JumlahKegiatanVisitePasienPertamaController::class, 'store']);
      Route::delete('/visite-pertama/delete/{id}', [JumlahKegiatanVisitePasienPertamaController::class, 'destroy']);
   });

   Route::middleware(['permission:edit rasio POBO'])->group(function () {
      Route::get('/rasio-pobo', [RasioPOBOController::class, 'index']);
      Route::get('/rasio-pobo/input', [RasioPOBOController::class, 'create']);
      Route::post('/rasio-pobo/submit', [RasioPOBOController::class, 'store']);
      Route::delete('/rasio-pobo/delete/{id}', [RasioPOBOController::class, 'destroy']);
   });

   Route::middleware(['permission:edit pertumbuhan realisasi pendapatan dari pengelolaan aset BLU'])->group(function () {
      Route::get('/pertumbuhan-pendapatan-pengelolaan-aset-blu', [PertumbuhanRealisasiPendapatanDariPengelolaanAsetBLUController::class, 'index']);
      Route::get('/pertumbuhan-pendapatan-pengelolaan-aset-blu/input', [PertumbuhanRealisasiPendapatanDariPengelolaanAsetBLUController::class, 'create']);
      Route::post('/pertumbuhan-pendapatan-pengelolaan-aset-blu/submit', [PertumbuhanRealisasiPendapatanDariPengelolaanAsetBLUController::class, 'store']);
      Route::delete('/pertumbuhan-pendapatan-pengelolaan-aset-blu/delete/{id}', [PertumbuhanRealisasiPendapatanDariPengelolaanAsetBLUController::class, 'destroy']);
   });

   Route::middleware(['permission:edit penyelenggaraan RME'])->group(function () {
      Route::get('/penyelenggaraan-rme', [penyelenggaraanRMEController::class, 'index']);
      Route::get('/penyelenggaraan-rme/input', [penyelenggaraanRMEController::class, 'create']);
      Route::post('/penyelenggaraan-rme/submit', [penyelenggaraanRMEController::class, 'store']);
      Route::delete('/penyelenggaraan-rme/delete/{id}', [penyelenggaraanRMEController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan pelaksanaan protokol kesehatan'])->group(function () {
      Route::get('/kepatuhan-pelaksanaan-prokes', [KepatuhanPelaksanaanProkesController::class, 'index']);
      Route::get('/kepatuhan-pelaksanaan-prokes/input', [KepatuhanPelaksanaanProkesController::class, 'create']);
      Route::post('/kepatuhan-pelaksanaan-prokes/submit', [KepatuhanPelaksanaanProkesController::class, 'store']);
      Route::delete('/kepatuhan-pelaksanaan-prokes/delete/{id}', [KepatuhanPelaksanaanProkesController::class, 'destroy']);
   });

   Route::middleware(['permission:edit persentase pembelian alkes produksi dalam negeri'])->group(function () {
      Route::get('/alkes', [PembelianAlkesDalamNegeriController::class, 'index']);
      Route::get('/alkes/input', [PembelianAlkesDalamNegeriController::class, 'create']);
      Route::post('/alkes/submit', [PembelianAlkesDalamNegeriController::class, 'store']);
      Route::delete('/alkes/delete/{id}', [PembelianAlkesDalamNegeriController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepuasan pasien'])->group(function () {
      Route::get('/kepuasan-pasien', [KepuasanPasienController::class, 'index']);
      Route::get('/kepuasan-pasien/input', [KepuasanPasienController::class, 'create']);
      Route::post('/kepuasan-pasien/submit', [KepuasanPasienController::class, 'store']);
      Route::delete('/kepuasan-pasien/delete/{id}', [KepuasanPasienController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan waktu visite DPJP'])->group(function () {
      Route::get('/kepatuhan-waktu-visite-dpjp', [KepatuhanWaktuVisiteDPJPController::class, 'index']);
      Route::get('/kepatuhan-waktu-visite-dpjp/input', [KepatuhanWaktuVisiteDPJPController::class, 'create']);
      Route::post('/kepatuhan-waktu-visite-dpjp/submit', [KepatuhanWaktuVisiteDPJPController::class, 'store']);
      Route::delete('/kepatuhan-waktu-visite-dpjp/delete/{id}', [KepatuhanWaktuVisiteDPJPController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan kebersihan tangan'])->group(function () {
      Route::get('/kepatuhan-kebersihan-tangan', [KepatuhanKebersihanTanganController::class, 'index']);
      Route::get('/kepatuhan-kebersihan-tangan/input', [KepatuhanKebersihanTanganController::class, 'create']);
      Route::post('/kepatuhan-kebersihan-tangan/submit', [KepatuhanKebersihanTanganController::class, 'store']);
      Route::delete('/kepatuhan-kebersihan-tangan/delete/{id}', [KepatuhanKebersihanTanganController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan penggunaan APD'])->group(function () {
      Route::get('/kepatuhan-penggunaan-apd', [KepatuhanPenggunaanAPDController::class, 'index']);
      Route::get('/kepatuhan-penggunaan-apd/input', [KepatuhanPenggunaanAPDController::class, 'create']);
      Route::post('/kepatuhan-penggunaan-apd/submit', [KepatuhanPenggunaanAPDController::class, 'store']);
      Route::delete('/kepatuhan-penggunaan-apd/delete/{id}', [KepatuhanPenggunaanAPDController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan identifikasi pasien'])->group(function () {
      Route::get('/kepatuhan-identifikasi-pasien', [KepatuhanIdentifikasiPasienController::class, 'index']);
      Route::get('/kepatuhan-identifikasi-pasien/input', [KepatuhanIdentifikasiPasienController::class, 'create']);
      Route::post('/kepatuhan-identifikasi-pasien/submit', [KepatuhanIdentifikasiPasienController::class, 'store']);
      Route::delete('/kepatuhan-identifikasi-pasien/delete/{id}', [KepatuhanIdentifikasiPasienController::class, 'destroy']);
   });

   Route::middleware(['permission:edit waktu tanggap operasi seksio sesarea emergensi'])->group(function () {
      Route::get('/waktu-tanggap-operasi-seksio-sesarea', [WaktuTanggapOperasiSeksioSesareaEmergensiController::class, 'index']);
      Route::get('/waktu-tanggap-operasi-seksio-sesarea/input', [WaktuTanggapOperasiSeksioSesareaEmergensiController::class, 'create']);
      Route::post('/waktu-tanggap-operasi-seksio-sesarea/submit', [WaktuTanggapOperasiSeksioSesareaEmergensiController::class, 'store']);
      Route::delete('/waktu-tanggap-operasi-seksio-sesarea/delete/{id}', [WaktuTanggapOperasiSeksioSesareaEmergensiController::class, 'destroy']);
   });

   Route::middleware(['permission:edit waktu tunggu rawat jalan'])->group(function () {
      Route::get('/waktu-tunggu-ralan', [WaktuTungguRawatJalanController::class, 'index']);
      Route::get('/waktu-tunggu-ralan/input', [WaktuTungguRawatJalanController::class, 'create']);
      Route::post('/waktu-tunggu-ralan/submit', [WaktuTungguRawatJalanController::class, 'store']);
      Route::delete('/waktu-tunggu-ralan/delete/{id}', [WaktuTungguRawatJalanController::class, 'destroy']);
   });

   Route::middleware(['permission:edit penundaan operasi elektif'])->group(function () {
      Route::get('/penundaan-operasi-elektif', [PenundaanOperasiElektifController::class, 'index']);
      Route::get('/penundaan-operasi-elektif/input', [PenundaanOperasiElektifController::class, 'create']);
      Route::post('/penundaan-operasi-elektif/submit', [PenundaanOperasiElektifController::class, 'store']);
      Route::delete('/penundaan-operasi-elektif/delete/{id}', [PenundaanOperasiElektifController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan waktu visite dokter'])->group(function () {
      Route::get('/kepatuhan-waktu-visite-dokter', [KepatuhanWaktuVisiteDokterController::class, 'index']);
      Route::get('/kepatuhan-waktu-visite-dokter/input', [KepatuhanWaktuVisiteDokterController::class, 'create']);
      Route::post('/kepatuhan-waktu-visite-dokter/submit', [KepatuhanWaktuVisiteDokterController::class, 'store']);
      Route::delete('/kepatuhan-waktu-visite-dokter/delete/{id}', [KepatuhanWaktuVisiteDokterController::class, 'destroy']);
   });

   Route::middleware(['permission:edit pelaporan hasil kritis laboratorium'])->group(function () {
      Route::get('/pelaporan-hasil-kritis-laboratorium', [PelaporanHasilKritisLabController::class, 'index']);
      Route::get('/pelaporan-hasil-kritis-laboratorium/input', [PelaporanHasilKritisLabController::class, 'create']);
      Route::post('/pelaporan-hasil-kritis-laboratorium/submit', [PelaporanHasilKritisLabController::class, 'store']);
      Route::delete('/pelaporan-hasil-kritis-laboratorium/delete/{id}', [PelaporanHasilKritisLabController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan penggunaan fornas'])->group(function () {
      Route::get('/kepatuhan-penggunaan-fornas', [KepatuhanPenggunaanFormulariumNasionalController::class, 'index']);
      Route::get('/kepatuhan-penggunaan-fornas/input', [KepatuhanPenggunaanFormulariumNasionalController::class, 'create']);
      Route::post('/kepatuhan-penggunaan-fornas/submit', [KepatuhanPenggunaanFormulariumNasionalController::class, 'store']);
      Route::delete('/kepatuhan-penggunaan-fornas/delete/{id}', [KepatuhanPenggunaanFormulariumNasionalController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan alur klinis'])->group(function () {
      Route::get('/kepatuhan-alur-klinis', [KepatuhanAlurKlinisController::class, 'index']);
      Route::get('/kepatuhan-alur-klinis/input', [KepatuhanAlurKlinisController::class, 'create']);
      Route::post('/kepatuhan-alur-klinis/submit', [KepatuhanAlurKlinisController::class, 'store']);
      Route::delete('/kepatuhan-alur-klinis/delete/{id}', [KepatuhanAlurKlinisController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kepatuhan upaya pencegahan resiko pasien jatuh'])->group(function () {
      Route::get('/kepatuhan-upaya-pencegahan-resiko-pasien-jatuh', [KepatuhanPencegahanResikoPasienJatuhController::class, 'index']);
      Route::get('/kepatuhan-upaya-pencegahan-resiko-pasien-jatuh/input', [KepatuhanPencegahanResikoPasienJatuhController::class, 'create']);
      Route::post('/kepatuhan-upaya-pencegahan-resiko-pasien-jatuh/submit', [KepatuhanPencegahanResikoPasienJatuhController::class, 'store']);
      Route::delete('/kepatuhan-upaya-pencegahan-resiko-pasien-jatuh/delete/{id}', [KepatuhanPencegahanResikoPasienJatuhController::class, 'destroy']);
   });

   Route::middleware(['permission:edit kecepatan waktu tanggap komplain'])->group(function () {
      Route::get('/kecepatan-waktu-tanggap-komplain', [KecepatanWaktuTanggapKomplainController::class, 'index']);
      Route::get('/kecepatan-waktu-tanggap-komplain/input', [KecepatanWaktuTanggapKomplainController::class, 'create']);
      Route::post('/kecepatan-waktu-tanggap-komplain/submit', [KecepatanWaktuTanggapKomplainController::class, 'store']);
      Route::delete('/kecepatan-waktu-tanggap-komplain/delete/{id}', [KecepatanWaktuTanggapKomplainController::class, 'destroy']);
   });

   Route::get('/ganti-password', [GantiPasswordController::class, 'index']);
   Route::post('/ganti-password', [GantiPasswordController::class, 'authenticate']);
   Route::get('/logout', [AuthController::class, 'logout']);   
});