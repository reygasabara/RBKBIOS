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

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Jumlah Perawat</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <a href="/perawat/input" class="btn btn-success">Input</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table-dark table" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggak Transaksi</th>
                            <th>PNS</th>
                            <th>PPPK</th>
                            <th>Anggota</th>
                            <th>Non PNS Tetap</th>
                            <th>Kontrak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data['tgl_transaksi'] }}</td>
                                <td>{{ $data['pns'] }}</td>
                                <td>{{ $data['pppk'] }}</td>
                                <td>{{ $data['anggota'] }}</td>
                                <td>{{ $data['non_pns_tetap'] }}</td>
                                <td>{{ $data['kontrak'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <table id="tabelPerawat" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Tanggak Transaksi</th>
                        <th>PNS</th>
                        <th>PPPK</th>
                        <th>Anggota</th>
                        <th>Non PNS Tetap</th>
                        <th>Kontrak</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table> --}}
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
            let satker = "651650";
            let key = "O78gois12Lg94vqxxazS9N0uxtmwFQ8R";

            $(function() {

                $('#table1').DataTable()

                let jtoken;
                let jperawat;
                let token;

                $.ajax({
                    type: 'POST',
                    url: 'https://training-bios2.kemenkeu.go.id/api/token',
                    data: {
                        satker: satker,
                        key: key
                    },
                    success: function(datatoken) {
                        jtoken = JSON.parse(datatoken);
                        token = jtoken['token'];

                        $.ajax({
                            type: 'POST',
                            url: 'https://training-bios2.kemenkeu.go.id/api/get/data/kesehatan/sdm/perawat',
                            headers: {
                                token: token
                            },
                            success: function(dataperawat) {
                                jperawat = JSON.parse(dataperawat);
                                console.log(jperawat['data']['datas']['0']);

                            }
                        });
                    }
                });
            });


            // $(function token(token) {
            //     $.ajax({
            //         type: 'POST',
            //         url: 'https://training-bios2.kemenkeu.go.id/api/get/data/kesehatan/sdm/perawat',
            //         headers: {"token": token},
            //         success: function(data) {
            //         }
            //     });
            // })
        </script>
    @endpush
@endsection
