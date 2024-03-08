@extends('layouts.master')

@section('title')
    LAYANAN
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

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Jumlah Pelayanan Dokpol</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <a href="/dokpol/input" class="btn btn-success">Input</a>
                        </div>
                    </div>
                </div>

                <div>
                    <h6 class="text-right">
                        <strong><em>*Data dikirimkan per periode bulanan</em></strong>
                        <br>
                        <strong><em>*Data yang dikirimkan merupakan jumlah layanan yang diberikan sesuai kategori layanan
                                dokpol.</em></strong>
                    </h6>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table-dark table-hover table" id="table">
                    <thead>
                        <tr>
                            <th>Tanggak Transaksi</th>
                            <th>Kedokteran Forensik</th>
                            <th>Psikiatri Forensik</th>
                            <th>Sentral Visum dan Medikolegal</th>
                            <th>PPAT</th>
                            <th>Odontologi Forensik</th>
                            <th>Psikologi Forensik</th>
                            <th>Antropologi Forensik</th>
                            <th>Olah TKP Medis</th>
                            <th>Kesehatan Tahanan</th>
                            <th>Narkoba</th>
                            <th>Toksikologi Medik</th>
                            <th>Pelayanan DNA</th>
                            <th>PAM Keslap Food Security</th>
                            <th>DVI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data['tgl_transaksi'] }}</td>
                                <td>{{ $data['kedokteran_forensik'] }}</td>
                                <td>{{ $data['psikiatri_forensik'] }}</td>
                                <td>{{ $data['sentra_visum_dan_medikolegal'] }}</td>
                                <td>{{ $data['ppat'] }}</td>
                                <td>{{ $data['odontologi_forensik'] }}</td>
                                <td>{{ $data['psikologi_forensik'] }}</td>
                                <td>{{ $data['antropologi_forensik'] }}</td>
                                <td>{{ $data['olah_tkp_medis'] }}</td>
                                <td>{{ $data['kesehatan_tahanan'] }}</td>
                                <td>{{ $data['narkoba'] }}</td>
                                <td>{{ $data['toksikologi_medik'] }}</td>
                                <td>{{ $data['pelayanan_dna'] }}</td>
                                <td>{{ $data['pam_keslap_food_security'] }}</td>
                                <td>{{ $data['dvi'] }}</td>
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
