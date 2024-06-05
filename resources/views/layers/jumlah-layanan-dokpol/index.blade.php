@extends('layouts.master')

@section('title')
    LAYANAN
@endsection

@section('content')
    <section class="content">
        <div class="box" style="position: relative">
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
                    <div class="col-sm-3" style="margin-top: 15px; translate: -15px;">
                        @if ($updated)
                            <div style="width: 200px; padding:  0 10px;background-color:#30fa11d8">
                                <p><b>Status</b> : Data telah diperbarui.</p>
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
                            <strong><em>*Data dikirimkan per periode bulanan (bersifat akumulatif)</em></strong>
                            <br>
                            <strong><em>*Data yang dikirimkan merupakan jumlah layanan yang diberikan sesuai kategori
                                    layanan
                                    dokpol.</em></strong>
                        </h6>
                    </div>

                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table-dark table-hover table" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
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
                                <td><a href="dokpol/delete/{{ $data['id'] }}" class="btn btn-danger"
                                        data-confirm-delete="true">Hapus</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
