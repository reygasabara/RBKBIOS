@extends('layouts.master')

@section('title')
    SDM
@endsection

@section('content')
    <section class="content">

        @if ($savedData)
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <p>Data berhasil disimpan.</p>
            </div>
        @endif

        <div class="box" style="position: relative">
            @if ($notifikasi)
                <div id="errorContainerBox" class=""
                    style="width:100%; height:100%; padding:0 10px; display:none; z-index:100;background-color:rgba(0, 0, 0, 0.05); position: absolute; "
                    onclick="closeButton()">
                    <div class="bg-danger"
                        style="width:50%; max-height:90%; margin:auto; padding: 20px; position: relative;overflow:auto;">
                        <h2 class="text-center">ERROR HISTORY</h1>
                            <p>Terdapat data yang gagal dikirim secara otomatis.
                                <span id="close" class="material-symbols-outlined"
                                    style="cursor: pointer; position:absolute; right:10px; top:10px;"
                                    onclick="closeButton()">
                                    cancel
                                </span>
                            <div class="">
                                <ul>
                                    @foreach ($notifikasi as $pesan)
                                        <li>{{ $pesan }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <form method="post" role="form" action="notifikasi/delete">
                                @csrf
                                <input type="hidden" name="submenu" value="saldo operasional">
                                <button type="submit" class="btn-danger center-block">Hapus
                                    History</button>
                            </form>
                    </div>
                </div>
            @endif

            <div class="box-header with-border">
                <h3 class="box-title">Jumlah Ahli Gizi</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <a href="/ahli-gizi/input" class="btn btn-success">Input</a>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="col-sm-3" style="margin-top: 15px; translate: -15px;">
                        @if ($updateStatus == 'updated')
                            <div class="bg-success" style="width: 200px; padding:  0 10px;">
                                <p><b>Status</b> : Data telah diperbarui.</p>
                            </div>
                        @elseif ($updateStatus == 'partially updated')
                            <div class="bg-warning"
                                style="width: 285px; padding:  0 10px; display: flex; align-items: center;">
                                <p><b>Status</b> : Data telah diperbarui sebagian.
                                    @if ($notifikasi)
                                        <span id="viewError" class="material-symbols-outlined"
                                            style="font-size: 20px; margin-left: 8px; translate: 0 7px;cursor: pointer;">
                                            eye_tracking
                                        </span>
                                    @endif
                                </p>
                            </div>

                            <h6>Terakhir Update : {{ $lastUpdate }}</h6>
                        @else
                            <div class="bg-danger" style="width: 220px; padding:  0 10px;">
                                <p><b>Status</b> :Data belum diperbarui.</p>
                            </div>

                            <h6>Terakhir Update : {{ $lastUpdate }}</h6>
                        @endif
                    </div>

                    <div class="col-sm-9" style="translate: 15px;">
                        <h6 class="text-right">
                            <strong><em>*Data awal dikirimkan pada awal tahun berkenaan. Sedangkan, updating data dikirimkan
                                    per
                                    periode
                                    semesteran/tahunan.</em></strong>
                            <br>
                            <strong><em>*Data yang dikirimkan merupakan jumlah pegawai sesuai kriteria.</em></strong>
                        </h6>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table class="table-dark table" id="table">
                    <thead>
                        <tr>
                            <th>Tanggak Transaksi</th>
                            <th>PNS</th>
                            <th>PPPK</th>
                            <th>Anggota</th>
                            <th>Non PNS Tetap</th>
                            <th>Kontrak</th>
                            <th>Tanggal Update (WIB)</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($datas as $data)
                            <tr @if ($data['updated_at'] < $updateDatetime) class="bg-warning" @endif>
                                <td>{{ $data['tgl_transaksi'] }}</td>
                                <td>{{ $data['pns'] }}</td>
                                <td>{{ $data['pppk'] }}</td>
                                <td>{{ $data['anggota'] }}</td>
                                <td>{{ $data['non_pns_tetap'] }}</td>
                                <td>{{ $data['kontrak'] }}</td>
                                <td>{{ $data['updated_at'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="modal-default" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <p>One fine body…</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(function() {
                $('#table').DataTable()
            });
        </script>
    @endpush
@endsection
