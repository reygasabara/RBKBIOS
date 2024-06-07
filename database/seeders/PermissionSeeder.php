<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Membuat permissions
        Permission::firstOrCreate(['name' => 'edit penerimaan']);
        Permission::firstOrCreate(['name' => 'edit pengeluaran']);
        Permission::firstOrCreate(['name' => 'edit saldo - operasional']);
        Permission::firstOrCreate(['name' => 'edit saldo - pengelolaan kas']);
        Permission::firstOrCreate(['name' => 'edit saldo - dana kelolaan']);

        Permission::firstOrCreate(['name' => 'edit jumlah dokter spesialis']);
        Permission::firstOrCreate(['name' => 'edit jumlah dokter gigi']);
        Permission::firstOrCreate(['name' => 'edit jumlah dokter umum']);
        Permission::firstOrCreate(['name' => 'edit jumlah tenaga perawat']);
        Permission::firstOrCreate(['name' => 'edit jumlah tenaga bidan']);
        Permission::firstOrCreate(['name' => 'edit jumlah pranata laboratorium']);
        Permission::firstOrCreate(['name' => 'edit jumlah radiografer']);
        Permission::firstOrCreate(['name' => 'edit jumlah ahli gizi']);
        Permission::firstOrCreate(['name' => 'edit jumlah fisioterapis']);
        Permission::firstOrCreate(['name' => 'edit jumlah apoteker']);
        Permission::firstOrCreate(['name' => 'edit jumlah tenaga profesional lainnya']);
        Permission::firstOrCreate(['name' => 'edit jumlah tenaga non-medis']);
        Permission::firstOrCreate(['name' => 'edit jumlah tenaga non-medis administrasi']);
        Permission::firstOrCreate(['name' => 'edit jumlah sanitarian']);

        Permission::firstOrCreate(['name' => 'edit jumlah pasien rawat inap']);
        Permission::firstOrCreate(['name' => 'edit jumlah pasien rawat darurat']);
        Permission::firstOrCreate(['name' => 'edit jumlah layanan laboratorium (sampel)']);
        Permission::firstOrCreate(['name' => 'edit jumlah layanan laboratorium (parameter)']);
        Permission::firstOrCreate(['name' => 'edit jumlah tindakan operasi']);
        Permission::firstOrCreate(['name' => 'edit jumlah layanan radiologi']);
        Permission::firstOrCreate(['name' => 'edit jumlah layanan forensik']);
        Permission::firstOrCreate(['name' => 'edit jumlah kunjungan rawat jalan']);
        Permission::firstOrCreate(['name' => 'edit jumlah pasien rawat jalan/poli']);
        Permission::firstOrCreate(['name' => 'edit jumlah pasien BPJS/Non-BPJS']);
        Permission::firstOrCreate(['name' => 'edit jumlah layanan farmasi']);
        Permission::firstOrCreate(['name' => 'edit BOR']);
        Permission::firstOrCreate(['name' => 'edit TOI']);
        Permission::firstOrCreate(['name' => 'edit ALOS']);
        Permission::firstOrCreate(['name' => 'edit BTO']);
        Permission::firstOrCreate(['name' => 'edit jumlah pelayanan dokpol']);
        Permission::firstOrCreate(['name' => 'edit indeks kepuasan masyarakat']);

        Permission::firstOrCreate(['name' => 'edit jumlah visite pasien di bawah jam 10']);
        Permission::firstOrCreate(['name' => 'edit jumlah visite pasien jam 10 s.d 12']);
        Permission::firstOrCreate(['name' => 'edit jumlah visite pasien di atas jam 12']);
        Permission::firstOrCreate(['name' => 'edit jumlah DPJP tidak visite']);
        Permission::firstOrCreate(['name' => 'edit jumlah visite pertama']);
        Permission::firstOrCreate(['name' => 'edit rasio POBO']);
        Permission::firstOrCreate(['name' => 'edit pertumbuhan realisasi pendapatan dari pengelolaan aset BLU']);
        Permission::firstOrCreate(['name' => 'edit penyelenggaraan RME']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan pelaksanaan protokol kesehatan']);
        Permission::firstOrCreate(['name' => 'edit persentase pembelian alkes produksi dalam negeri']);
        Permission::firstOrCreate(['name' => 'edit kepuasan pasien']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan waktu visite DPJP']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan kebersihan tangan']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan penggunaan APD']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan identifikasi pasien']);
        Permission::firstOrCreate(['name' => 'edit waktu tanggap operasi seksio sesarea emergensi']);
        Permission::firstOrCreate(['name' => 'edit waktu tunggu rawat jalan']);
        Permission::firstOrCreate(['name' => 'edit penundaan operasi elektif']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan waktu visite dokter']);
        Permission::firstOrCreate(['name' => 'edit pelaporan hasil kritis laboratorium']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan penggunaan fornas']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan alur klinis']);
        Permission::firstOrCreate(['name' => 'edit kepatuhan upaya pencegahan resiko pasien jatuh']);
        Permission::firstOrCreate(['name' => 'edit kecepatan waktu tanggap komplain']);

        Permission::firstOrCreate(['name' => 'lihat log pengiriman']);
        Permission::firstOrCreate(['name' => 'lihat status pengiriman']);

        Permission::firstOrCreate(['name' => 'edit users']);
        Permission::firstOrCreate(['name' => 'edit peran']);

        // Membuat roles dan menambahkan permissions
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo('edit penerimaan');
        $admin->givePermissionTo('edit pengeluaran');
        $admin->givePermissionTo('edit saldo - operasional');
        $admin->givePermissionTo('edit saldo - pengelolaan kas');
        $admin->givePermissionTo('edit saldo - dana kelolaan');
        $admin->givePermissionTo('edit jumlah dokter spesialis');
        $admin->givePermissionTo('edit jumlah dokter gigi');
        $admin->givePermissionTo('edit jumlah dokter umum');
        $admin->givePermissionTo('edit jumlah tenaga perawat');
        $admin->givePermissionTo('edit jumlah tenaga bidan');
        $admin->givePermissionTo('edit jumlah pranata laboratorium');
        $admin->givePermissionTo('edit jumlah radiografer');
        $admin->givePermissionTo('edit jumlah ahli gizi');
        $admin->givePermissionTo('edit jumlah fisioterapis');
        $admin->givePermissionTo('edit jumlah apoteker');
        $admin->givePermissionTo('edit jumlah tenaga profesional lainnya');
        $admin->givePermissionTo('edit jumlah tenaga non-medis');
        $admin->givePermissionTo('edit jumlah tenaga non-medis administrasi');
        $admin->givePermissionTo('edit jumlah sanitarian');
        $admin->givePermissionTo('edit jumlah pasien rawat inap');
        $admin->givePermissionTo('edit jumlah pasien rawat darurat');
        $admin->givePermissionTo('edit jumlah layanan laboratorium (sampel)');
        $admin->givePermissionTo('edit jumlah layanan laboratorium (parameter)');
        $admin->givePermissionTo('edit jumlah tindakan operasi');
        $admin->givePermissionTo('edit jumlah layanan radiologi');
        $admin->givePermissionTo('edit jumlah layanan forensik');
        $admin->givePermissionTo('edit jumlah kunjungan rawat jalan');
        $admin->givePermissionTo('edit jumlah pasien rawat jalan/poli');
        $admin->givePermissionTo('edit jumlah pasien BPJS/Non-BPJS');
        $admin->givePermissionTo('edit jumlah layanan farmasi');
        $admin->givePermissionTo('edit BOR');
        $admin->givePermissionTo('edit TOI');
        $admin->givePermissionTo('edit ALOS');
        $admin->givePermissionTo('edit BTO');
        $admin->givePermissionTo('edit jumlah pelayanan dokpol');
        $admin->givePermissionTo('edit indeks kepuasan masyarakat');
        $admin->givePermissionTo('edit jumlah visite pasien di bawah jam 10');
        $admin->givePermissionTo('edit jumlah visite pasien jam 10 s.d 12');
        $admin->givePermissionTo('edit jumlah visite pasien di atas jam 12');
        $admin->givePermissionTo('edit jumlah DPJP tidak visite');
        $admin->givePermissionTo('edit jumlah visite pertama');
        $admin->givePermissionTo('edit rasio POBO');
        $admin->givePermissionTo('edit pertumbuhan realisasi pendapatan dari pengelolaan aset BLU');
        $admin->givePermissionTo('edit penyelenggaraan RME');
        $admin->givePermissionTo('edit kepatuhan pelaksanaan protokol kesehatan');
        $admin->givePermissionTo('edit persentase pembelian alkes produksi dalam negeri');
        $admin->givePermissionTo('edit kepuasan pasien');
        $admin->givePermissionTo('edit kepatuhan waktu visite DPJP');
        $admin->givePermissionTo('edit kepatuhan kebersihan tangan');
        $admin->givePermissionTo('edit kepatuhan penggunaan APD');
        $admin->givePermissionTo('edit kepatuhan identifikasi pasien');
        $admin->givePermissionTo('edit waktu tanggap operasi seksio sesarea emergensi');
        $admin->givePermissionTo('edit waktu tunggu rawat jalan');
        $admin->givePermissionTo('edit penundaan operasi elektif');
        $admin->givePermissionTo('edit kepatuhan waktu visite dokter');
        $admin->givePermissionTo('edit pelaporan hasil kritis laboratorium');
        $admin->givePermissionTo('edit kepatuhan penggunaan fornas');
        $admin->givePermissionTo('edit kepatuhan alur klinis');
        $admin->givePermissionTo('edit kepatuhan upaya pencegahan resiko pasien jatuh');
        $admin->givePermissionTo('edit kecepatan waktu tanggap komplain');

        $pengelolaKeuangan = Role::firstOrCreate(['name' => 'Pengelola Keuangan']);
        $pengelolaKeuangan->givePermissionTo('edit penerimaan');
        $pengelolaKeuangan->givePermissionTo('edit pengeluaran');
        $pengelolaKeuangan->givePermissionTo('edit saldo - operasional');
        $pengelolaKeuangan->givePermissionTo('edit saldo - pengelolaan kas');
        $pengelolaKeuangan->givePermissionTo('edit saldo - dana kelolaan');
        $pengelolaKeuangan->givePermissionTo('edit pertumbuhan realisasi pendapatan dari pengelolaan aset BLU');

        $sdm = Role::firstOrCreate(['name' => 'SDM']);
        $sdm->givePermissionTo('edit jumlah dokter spesialis');
        $sdm->givePermissionTo('edit jumlah dokter gigi');
        $sdm->givePermissionTo('edit jumlah dokter umum');
        $sdm->givePermissionTo('edit jumlah tenaga perawat');
        $sdm->givePermissionTo('edit jumlah tenaga bidan');
        $sdm->givePermissionTo('edit jumlah pranata laboratorium');
        $sdm->givePermissionTo('edit jumlah radiografer');
        $sdm->givePermissionTo('edit jumlah ahli gizi');
        $sdm->givePermissionTo('edit jumlah fisioterapis');
        $sdm->givePermissionTo('edit jumlah apoteker');
        $sdm->givePermissionTo('edit jumlah tenaga profesional lainnya');
        $sdm->givePermissionTo('edit jumlah tenaga non-medis');
        $sdm->givePermissionTo('edit jumlah tenaga non-medis administrasi');
        $sdm->givePermissionTo('edit jumlah sanitarian');

        $layanan = Role::firstOrCreate(['name' => 'Layanan']);
        $layanan->givePermissionTo('edit jumlah pasien rawat inap');
        $layanan->givePermissionTo('edit jumlah pasien rawat darurat');
        $layanan->givePermissionTo('edit jumlah layanan laboratorium (sampel)');
        $layanan->givePermissionTo('edit jumlah layanan laboratorium (parameter)');
        $layanan->givePermissionTo('edit jumlah tindakan operasi');
        $layanan->givePermissionTo('edit jumlah layanan radiologi');
        $layanan->givePermissionTo('edit jumlah layanan forensik');
        $layanan->givePermissionTo('edit jumlah kunjungan rawat jalan');
        $layanan->givePermissionTo('edit jumlah pasien rawat jalan/poli');
        $layanan->givePermissionTo('edit jumlah pasien BPJS/Non-BPJS');
        $layanan->givePermissionTo('edit jumlah layanan farmasi');
        $layanan->givePermissionTo('edit BOR');
        $layanan->givePermissionTo('edit TOI');
        $layanan->givePermissionTo('edit ALOS');
        $layanan->givePermissionTo('edit BTO');
        $layanan->givePermissionTo('edit jumlah pelayanan dokpol');
        $layanan->givePermissionTo('edit indeks kepuasan masyarakat');

        $ikt = Role::firstOrCreate(['name' => 'IKT']);
        $ikt->givePermissionTo('edit jumlah visite pasien di bawah jam 10');
        $ikt->givePermissionTo('edit jumlah visite pasien jam 10 s.d 12');
        $ikt->givePermissionTo('edit jumlah visite pasien di atas jam 12');
        $ikt->givePermissionTo('edit jumlah DPJP tidak visite');
        $ikt->givePermissionTo('edit jumlah visite pertama');
        $ikt->givePermissionTo('edit rasio POBO');
        $ikt->givePermissionTo('edit pertumbuhan realisasi pendapatan dari pengelolaan aset BLU');
        $ikt->givePermissionTo('edit penyelenggaraan RME');
        $ikt->givePermissionTo('edit kepatuhan pelaksanaan protokol kesehatan');
        $ikt->givePermissionTo('edit persentase pembelian alkes produksi dalam negeri');
        $ikt->givePermissionTo('edit kepuasan pasien');
        $ikt->givePermissionTo('edit kepatuhan waktu visite DPJP');
        $ikt->givePermissionTo('edit kepatuhan kebersihan tangan');
        $ikt->givePermissionTo('edit kepatuhan penggunaan APD');
        $ikt->givePermissionTo('edit kepatuhan identifikasi pasien');
        $ikt->givePermissionTo('edit waktu tanggap operasi seksio sesarea emergensi');
        $ikt->givePermissionTo('edit waktu tunggu rawat jalan');
        $ikt->givePermissionTo('edit penundaan operasi elektif');
        $ikt->givePermissionTo('edit kepatuhan waktu visite dokter');
        $ikt->givePermissionTo('edit pelaporan hasil kritis laboratorium');
        $ikt->givePermissionTo('edit kepatuhan penggunaan fornas');
        $ikt->givePermissionTo('edit kepatuhan alur klinis');
        $ikt->givePermissionTo('edit kepatuhan upaya pencegahan resiko pasien jatuh');
        $ikt->givePermissionTo('edit kecepatan waktu tanggap komplain');

        $ranap = Role::firstOrCreate(['name' => 'Perawat (Rawat Inap)']);
        $ranap->givePermissionTo('edit jumlah pasien rawat inap');
        $ranap->givePermissionTo('edit jumlah visite pasien di bawah jam 10');
        $ranap->givePermissionTo('edit jumlah visite pasien jam 10 s.d 12');
        $ranap->givePermissionTo('edit jumlah visite pasien di atas jam 12');
        $ranap->givePermissionTo('edit jumlah DPJP tidak visite');
        $ranap->givePermissionTo('edit jumlah visite pertama');

        $igd = Role::firstOrCreate(['name' => 'Perawat IGD']);
        $igd->givePermissionTo('edit jumlah pasien rawat darurat');

        $pranataLaboratorium = Role::firstOrCreate(['name' => 'Pranata Laboratorium']);
        $pranataLaboratorium->givePermissionTo('edit jumlah layanan laboratorium (sampel)');
        $pranataLaboratorium->givePermissionTo('edit jumlah layanan laboratorium (parameter)');

        $ok = Role::firstOrCreate(['name' => 'Perawat Bedah']);
        $ok->givePermissionTo('edit jumlah tindakan operasi');

        $radiografer = Role::firstOrCreate(['name' => 'Radiografer']);
        $radiografer->givePermissionTo('edit jumlah layanan radiologi');

        $dokpol = Role::firstOrCreate(['name' => 'Petugas Dokpol']);
        $dokpol->givePermissionTo('edit jumlah layanan forensik');
        $dokpol->givePermissionTo('edit jumlah pelayanan dokpol');

        $ralan = Role::firstOrCreate(['name' => 'Perawat (Rawat Jalan)']);
        $ralan->givePermissionTo('edit jumlah kunjungan rawat jalan');
        $ralan->givePermissionTo('edit jumlah pasien rawat jalan/poli');
        $ralan->givePermissionTo('edit jumlah pasien BPJS/Non-BPJS');

        $apoteker = Role::firstOrCreate(['name' => 'Apoteker']);
        $apoteker->givePermissionTo('edit jumlah layanan farmasi');

        $rekamMedis = Role::firstOrCreate(['name' => 'Petugas Rekam Medis']);
        $rekamMedis->givePermissionTo('edit penyelenggaraan RME');
    }
}
