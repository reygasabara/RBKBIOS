@extends('layouts.master')

@section('title')
    IKT
@endsection

@section('content')
    <section class="content">
        <div class="box" style="position: relative">
            <div class="box-header with-border">
                <h3 class="box-title">Kepuasan Pasien</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <a href="/kepuasan-pasien/input" class="btn btn-success">Input</a>
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
                            <strong><em>*Data dikirimkan per periode semesteran (tidak bersifat akumulatif)</em></strong> <br>
                            <strong><em>*Data yang dikirimkan sesuai dengan PerMenPanRB Nomor 14 tahun 2017</em></strong>
                        </h6>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table class="table-dark table" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data['tgl_transaksi'] }}</td>
                                <td>{{ $data['nilai'] }}</td>
                                <td><a href="kepuasan-pasien/delete/{{ $data['id'] }}" class="btn btn-danger"
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
                $('#table').DataTable();
            });
        </script>
    @endpush
@endsection
