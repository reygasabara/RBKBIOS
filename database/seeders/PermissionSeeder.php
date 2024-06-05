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
        Permission::firstOrCreate(['name' => 'edit users']);
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
        Permission::firstOrCreate(['name' => 'edit pertumbuhan realisasi pendapatan dari pengelolaan  aset BLU']);
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

        // Membuat roles dan menambahkan permissions
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $pengelolaKeuangan = Role::firstOrCreate(['name' => 'pengelola keuangan']);
        $pengelolaKeuangan->givePermissionTo('edit penerimaan');
        $pengelolaKeuangan->givePermissionTo('edit pengeluaran');
        $pengelolaKeuangan->givePermissionTo('edit saldo - operasional');
        $pengelolaKeuangan->givePermissionTo('edit saldo - pengelolaan kas');
        $pengelolaKeuangan->givePermissionTo('edit saldo - dana kelolaan');
        $pengelolaKeuangan->givePermissionTo('edit pertumbuhan realisasi pendapatan dari pengelolaan  aset BLU');

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

        $ranap = Role::firstOrCreate(['name' => 'rawat inap']);
        $ranap->givePermissionTo('edit jumlah pasien rawat inap');
        $ranap->givePermissionTo('edit jumlah visite pasien di bawah jam 10');
        $ranap->givePermissionTo('edit jumlah visite pasien jam 10 s.d 12');
        $ranap->givePermissionTo('edit jumlah visite pasien di atas jam 12');
        $ranap->givePermissionTo('edit jumlah DPJP tidak visite');
        $ranap->givePermissionTo('edit jumlah visite pertama');

        $igd = Role::firstOrCreate(['name' => 'igd']);
        $igd->givePermissionTo('edit jumlah pasien rawat darurat');

        $pranataLaboratorium = Role::firstOrCreate(['name' => 'pranata laboratorium']);
        $pranataLaboratorium->givePermissionTo('edit jumlah layanan laboratorium (sampel)');
        $pranataLaboratorium->givePermissionTo('edit jumlah layanan laboratorium (parameter)');

        $ok = Role::firstOrCreate(['name' => 'OK']);
        $ok->givePermissionTo('edit jumlah tindakan operasi');

        $radiografer = Role::firstOrCreate(['name' => 'radiografer']);
        $radiografer->givePermissionTo('edit jumlah layanan radiologi');

        $dokpol = Role::firstOrCreate(['name' => 'dokpol']);
        $dokpol->givePermissionTo('edit jumlah layanan forensik');
        $dokpol->givePermissionTo('edit jumlah pelayanan dokpol');

        $ralan = Role::firstOrCreate(['name' => 'rawat jalan']);
        $ralan->givePermissionTo('edit jumlah kunjungan rawat jalan');
        $ralan->givePermissionTo('edit jumlah pasien rawat jalan/poli');
        $ralan->givePermissionTo('edit jumlah pasien BPJS/Non-BPJS');

        $apoteker = Role::firstOrCreate(['name' => 'apoteker']);
        $apoteker->givePermissionTo('edit jumlah layanan farmasi');

        $rekamMedis = Role::firstOrCreate(['name' => 'rekam medis']);
        $rekamMedis->givePermissionTo('edit penyelenggaraan RME');
    }
}
