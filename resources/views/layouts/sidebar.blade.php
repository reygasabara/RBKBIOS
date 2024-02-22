<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            {{-- <li class="header">KESEHATAN</li> --}}
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
                                class="fa fa-circle-o"></i> Jumlah Layanan Lab (Sampel)</a></li>
                    <li @if ($active[1] == 'lab_parameter') class="active" @endif><a href="/lab-parameter"><i
                                class="fa fa-circle-o"></i> Jumlah Layanan Lab (Parameter)</a></li>
                    <li @if ($active[1] == 'operasi') class="active" @endif><a href="/tindakan-operasi"><i
                                class="fa fa-circle-o"></i> Jumlah Tindakan operasi</a></li>
                    <li @if ($active[1] == 'radiologi') class="active" @endif><a href="/layanan-radiologi"><i
                                class="fa fa-circle-o"></i> Jumlah Layanan Radiologi</a></li>
                    <li @if ($active[1] == 'forensik') class="active" @endif><a href="/layanan-forensik"><i
                                class="fa fa-circle-o"></i> Jumlah Layanan Forensik</a></li>
                    <li @if ($active[1] == 'pasien_ralan') class="active" @endif><a href="/kunjungan-ralan"><i
                                class="fa fa-circle-o"></i> Jumlah Kunjungan Rawat Jalan</a></li>
                    <li @if ($active[1] == 'pasien_ralan_poli') class="active" @endif><a href="/pasien-ralan-poli"><i
                                class="fa fa-circle-o"></i> Jumlah Pasien Rawat Jalan/Poli</a></li>
                    <li @if ($active[1] == 'bpjs_nonbpjs') class="active" @endif><a href="/pasien-bpjs-nonbpjs"><i
                                class="fa fa-circle-o"></i> Jumlah Pasien BPJS/Non-BPJS</a></li>
                    <li @if ($active[1] == 'farmasi') class="active" @endif><a href="/layanan-farmasi"><i
                                class="fa fa-circle-o"></i> Jumlah Layanan Farmasi</a></li>
                    <li @if ($active[1] == 'bor') class="active" @endif><a href="/bor"><i
                                class="fa fa-circle-o"></i> BOR (Bed Occupancy Ratio)</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Indikator Kinerja Terpilih</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Form 1</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Form 2</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
