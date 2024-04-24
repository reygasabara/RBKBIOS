<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            {{-- <li class="header">KESEHATAN</li> --}}
            <li class="treeview @if ($active[0] == 'keuangan') active @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>KEUANGAN</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if ($active[1] == 'penerimaan') class="active" @endif><a href="/penerimaan"><i
                                class="fa fa-circle-o"></i> Penerimaan</a></li>
                    <li @if ($active[1] == 'pengeluaran') class="active" @endif><a href="/pengeluaran"><i
                                class="fa fa-circle-o"></i> Pengeluaran</a></li>
                    <li @if ($active[1] == 'operasional') class="active" @endif><a href="/saldo-operasional"><i
                                class="fa fa-circle-o"></i> Saldo - Operasional</a></li>
                    <li @if ($active[1] == 'pengelolaan_kas') class="active" @endif><a href="/saldo-pengelolaan-kas"><i
                                class="fa fa-circle-o"></i> Saldo - Pengelolaan Kas</a></li>
                    <li @if ($active[1] == 'dana_kelolaan') class="active" @endif><a href="/saldo-dana-kelolaan"><i
                                class="fa fa-circle-o"></i> Saldo - Dana Kelolaan</a></li>
                </ul>
            </li>

            <li class="treeview @if ($active[0] == 'sdm') active @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>SDM</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if ($active[1] == 'dokter_spesialis') class="active" @endif><a href="/dokter-spesialis"><i
                                class="fa fa-circle-o"></i> Jumlah Dokter Spesialis</a></li>
                    <li @if ($active[1] == 'dokter_gigi') class="active" @endif><a href="/dokter-gigi"><i
                                class="fa fa-circle-o"></i> Jumlah Dokter Gigi</a></li>
                    <li @if ($active[1] == 'dokter_umum') class="active" @endif><a href="/dokter-umum"><i
                                class="fa fa-circle-o"></i> Jumlah Dokter Umum</a></li>
                    <li @if ($active[1] == 'perawat') class="active" @endif><a href="/perawat"><i
                                class="fa fa-circle-o"></i> Jumlah Tenaga Perawat</a></li>
                    <li @if ($active[1] == 'bidan') class="active" @endif><a href="/bidan"><i
                                class="fa fa-circle-o"></i> Jumlah Tenaga Bidan</a></li>
                    <li @if ($active[1] == 'pranata_laboratorium') class="active" @endif><a href="/pranata-laboratorium"><i
                                class="fa fa-circle-o"></i> Jumlah Pranata Laboratorium</a></li>
                    <li @if ($active[1] == 'radiografer') class="active" @endif><a href="/radiografer"><i
                                class="fa fa-circle-o"></i> Jumlah Radiografer</a></li>
                    <li @if ($active[1] == 'ahli_gizi') class="active" @endif><a href="/ahli-gizi"><i
                                class="fa fa-circle-o"></i> Jumlah Ahli Gizi</a></li>
                    <li @if ($active[1] == 'fisioterapis') class="active" @endif><a href="/fisioterapis"><i
                                class="fa fa-circle-o"></i> Jumlah Fisioterapis</a></li>
                    <li @if ($active[1] == 'apoteker') class="active" @endif><a href="/apoteker"><i
                                class="fa fa-circle-o"></i> Jumlah Apoteker</a></li>
                    <li @if ($active[1] == 'profesional_lainnya') class="active" @endif><a href="/profesional-lainnya"><i
                                class="fa fa-circle-o"></i> Tenaga Profesional
                            Lainnya</a></li>
                    <li @if ($active[1] == 'non_medis') class="active" @endif><a href="/non-medis"><i
                                class="fa fa-circle-o"></i> Jumlah Non-Medis</a></li>
                    <li @if ($active[1] == 'non_medis_adm') class="active" @endif><a href="/non-medis-administrasi"><i
                                class="fa fa-circle-o"></i> Non-Medis Administrasi</a></li>
                    <li @if ($active[1] == 'sanitarian') class="active" @endif><a href="/sanitarian"><i
                                class="fa fa-circle-o"></i> Jumlah Sanitarian</a></li>
                </ul>
            </li>
            <li class="treeview @if ($active[0] == 'layanan') active @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>LAYANAN</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if ($active[1] == 'pasien_ranap') class="active" @endif><a href="/pasien-ranap"><i
                                class="fa fa-circle-o"></i> Jumlah Pasien Rawat Inap</a></li>
                    <li @if ($active[1] == 'pasien_igd') class="active" @endif><a href="/pasien-igd"><i
                                class="fa fa-circle-o"></i> Jumlah Pasien Rawat Darurat</a></li>
                    <li @if ($active[1] == 'lab_sampel') class="active" @endif><a href="/lab-sampel"><i
                                class="fa fa-circle-o"></i> Layanan Lab (Sampel)</a></li>
                    <li @if ($active[1] == 'lab_parameter') class="active" @endif><a href="/lab-parameter"><i
                                class="fa fa-circle-o"></i> Layanan Lab (Parameter)</a></li>
                    <li @if ($active[1] == 'operasi') class="active" @endif><a href="/tindakan-operasi"><i
                                class="fa fa-circle-o"></i> Jumlah Tindakan operasi</a></li>
                    <li @if ($active[1] == 'radiologi') class="active" @endif><a href="/layanan-radiologi"><i
                                class="fa fa-circle-o"></i> Jumlah Layanan Radiologi</a></li>
                    <li @if ($active[1] == 'forensik') class="active" @endif><a href="/layanan-forensik"><i
                                class="fa fa-circle-o"></i> Jumlah Layanan Forensik</a></li>
                    <li @if ($active[1] == 'pasien_ralan') class="active" @endif><a href="/kunjungan-ralan"><i
                                class="fa fa-circle-o"></i> Jumlah Kunjungan Rawat Jalan</a></li>
                    <li @if ($active[1] == 'pasien_ralan_poli') class="active" @endif><a href="/pasien-ralan-poli"><i
                                class="fa fa-circle-o"></i> Jumlah Pasien Rawat Jalan</a></li>
                    <li @if ($active[1] == 'bpjs_nonbpjs') class="active" @endif><a href="/pasien-bpjs-nonbpjs"><i
                                class="fa fa-circle-o"></i> Jumlah Pasien BPJS/Non-BPJS</a></li>
                    <li @if ($active[1] == 'farmasi') class="active" @endif><a href="/layanan-farmasi"><i
                                class="fa fa-circle-o"></i> Jumlah Layanan Farmasi</a></li>
                    <li @if ($active[1] == 'bor') class="active" @endif><a href="/bor"><i
                                class="fa fa-circle-o"></i> BOR (Bed Occupancy Ratio)</a></li>
                    <li @if ($active[1] == 'toi') class="active" @endif><a href="/toi"><i
                                class="fa fa-circle-o"></i> TOI (Turn Over Interval)</a></li>
                    <li @if ($active[1] == 'alos') class="active" @endif><a href="/alos"><i
                                class="fa fa-circle-o"></i> ALOS (Average Length of Stay)</a></li>
                    <li @if ($active[1] == 'bto') class="active" @endif><a href="/bto"><i
                                class="fa fa-circle-o"></i> BTO (Bed Turn Over)</a></li>
                    <li @if ($active[1] == 'dokpol') class="active" @endif><a href="/dokpol"><i
                                class="fa fa-circle-o"></i> Jumlah Pelayanan Dokpol</a></li>
                    <li @if ($active[1] == 'ikim') class="active" @endif><a href="/ikm"><i
                                class="fa fa-circle-o"></i> Indeks Kepuasan Masyarakat</a></li>
                </ul>
            </li>
            <li class="treeview @if ($active[0] == 'ikt') active @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Indikator Kinerja Terpilih</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if ($active[1] == 'visite_dibawah_sepuluh') class="active" @endif><a href="/visite-dibawah-sepuluh"><i
                                class="fa fa-circle-o"></i> Visite di Bawah Jam 10.00</a>
                    <li @if ($active[1] == 'visite_sepuluh_duabelas') class="active" @endif><a href="/visite-sepuluh-duabelas"><i
                                class="fa fa-circle-o"></i> Visite Jam 10.00 s.d. 12.00</a>
                    <li @if ($active[1] == 'visite_diatas_duabelas') class="active" @endif><a href="/visite-diatas-duabelas"><i
                                class="fa fa-circle-o"></i> Visite di Atas Jam 12.00</a>
                    <li @if ($active[1] == 'dpjp_non_visite') class="active" @endif><a href="/dpjp-non-visite"><i
                                class="fa fa-circle-o"></i> Jumlah DPJP Tidak Visite</a>
                    <li @if ($active[1] == 'visite_pertama') class="active" @endif><a href="/visite-pertama"><i
                                class="fa fa-circle-o"></i> Jumlah Visite Pertama</a>
                    <li @if ($active[1] == 'rasio_pobo') class="active" @endif><a href="/rasio-pobo"><i
                                class="fa fa-circle-o"></i> Rasio POBO</a>
                    <li @if ($active[1] == 'pendapatan_aset_blu') class="active" @endif><a
                            href="/pertumbuhan-pendapatan-pengelolaan-aset-blu"><i class="fa fa-circle-o"></i>
                            Pendapatan Aset BLU</a>
                    </li>
                    <li @if ($active[1] == 'penyelenggaraan_rme') class="active" @endif><a href="/penyelenggaraan-rme"><i
                                class="fa fa-circle-o"></i>
                            Penyelenggaraan RME</a>
                    </li>
                    <li @if ($active[1] == 'pelaksanaan_prokes') class="active" @endif><a
                            href="/kepatuhan-pelaksanaan-prokes"><i class="fa fa-circle-o"></i>
                            Kepatuhan Pelaksanaan Prokes</a>
                    </li>
                    <li @if ($active[1] == 'alkes') class="active" @endif><a href="/alkes"><i
                                class="fa fa-circle-o"></i>
                            Pembelian Alat Kesehatan</a>
                    </li>
                    <li @if ($active[1] == 'kepuasan_pasien') class="active" @endif><a href="/kepuasan-pasien"><i
                                class="fa fa-circle-o"></i>
                            Kepuasan Pasien</a>
                    <li @if ($active[1] == 'kepatuhan_waktu_visite_dpjp') class="active" @endif><a
                            href="/kepatuhan-waktu-visite-dpjp"><i class="fa fa-circle-o"></i>
                            Kepatuhan Waktu Visite DPJP</a>
                    </li>
                    <li @if ($active[1] == 'kepatuhan_kebersihan_tangan') class="active" @endif><a
                            href="/kepatuhan-kebersihan-tangan"><i class="fa fa-circle-o"></i>
                            Kepatuhan Kebersihan Tangan</a>
                    </li>
                    <li @if ($active[1] == 'kepatuhan_apd') class="active" @endif><a
                            href="/kepatuhan-penggunaan-apd"><i class="fa fa-circle-o"></i>
                            Kepatuhan Penggunaan APD</a>
                    </li>
                    <li @if ($active[1] == 'kepatuhan_identifikasi_pasien') class="active" @endif><a
                            href="/kepatuhan-identifikasi-pasien"><i class="fa fa-circle-o"></i>
                            Kepatuhan Identifikasi Pasien</a>
                    </li>
                    <li @if ($active[1] == 'waktu_tanggap_operasi') class="active" @endif><a
                            href="/waktu-tanggap-operasi-seksio-sesarea"><i class="fa fa-circle-o"></i>
                            Waktu Tanggap Operasi</a>
                    </li>
                    <li @if ($active[1] == 'waktu_tunggu_ralan') class="active" @endif><a href="/waktu-tunggu-ralan"><i
                                class="fa fa-circle-o"></i>
                            Waktu Tunggu Rawat Jalan</a>
                    </li>
                    <li @if ($active[1] == 'penundaan_operasi_elektif') class="active" @endif><a
                            href="/penundaan-operasi-elektif"><i class="fa fa-circle-o"></i>
                            Penundaan Operasi Elektif</a>
                    </li>
                    <li @if ($active[1] == 'kepatuhan_waktu_visite_dokter') class="active" @endif><a
                            href="/kepatuhan-waktu-visite-dokter"><i class="fa fa-circle-o"></i>
                            Kepatuhan Waktu Visite Dokter</a>
                    </li>
                    <li @if ($active[1] == 'pelaporan_hasil_kritis_laboratorium') class="active" @endif><a
                            href="/pelaporan-hasil-kritis-laboratorium"><i class="fa fa-circle-o"></i>
                            pelaporan Hasil Kritis Lab</a>
                    </li>
                    <li @if ($active[1] == 'kepatuhan_penggunaan_fornas') class="active" @endif><a
                            href="/kepatuhan-penggunaan-fornas"><i class="fa fa-circle-o"></i>
                            Kepatuhan Penggunaan Fornas</a>
                    </li>
                    <li @if ($active[1] == 'kepatuhan_alur_klinis') class="active" @endif><a href="/kepatuhan-alur-klinis"><i
                                class="fa fa-circle-o"></i>
                            Kepatuhan Alur Klinis</a>
                    </li>
                    <li @if ($active[1] == 'kepatuhan_upaya_pencegahan_resiko_pasien_jatuh') class="active" @endif><a
                            href="/kepatuhan-upaya-pencegahan-resiko-pasien-jatuh"><i class="fa fa-circle-o"></i>
                            Pencegahan Risiko Pasien Jatuh</a>
                    </li>
                    <li @if ($active[1] == 'kecepatan_waktu_tanggap_komplain') class="active" @endif><a
                            href="/kecepatan-waktu-tanggap-komplain"><i class="fa fa-circle-o"></i>
                            Waktu Tanggap Komplain</a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if ($active[0] == 'monitoring') active @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Monitoring Pengiriman Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if ($active[1] == 'log') class="active" @endif><a
                            href="/monitoring/log-pengiriman"><i class="fa fa-circle-o"></i> Log Pengiriman</a></li>
                    <li @if ($active[1] == 'status') class="active" @endif><a
                            href="/monitoring/status-pengiriman"><i class="fa fa-circle-o"></i> Status Pengiriman</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
