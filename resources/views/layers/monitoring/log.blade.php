@extends('layouts.master')

@section('title')
    IKT
@endsection

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Log Pengiriman Data</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <a href="/visite-pertama/input" class="btn btn-success">Input</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body" style="margin-top: 40px">
                <table class="table-dark table" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Waktu Pengiriman</th>
                            <th>Modul</th>
                            <th>Jenis Data</th>
                            <th>Tanggal Transaksi</th>
                            <th>Kata Kunci</th>
                            <th>Status</th>
                            <th>Pesan</th>
                            <th>Eror</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data['waktu_pengiriman'] }}</td>
                                <td>{{ $data['modul'] }}</td>
                                <td>{{ $data['jenis_data'] }}</td>
                                <td>{{ $data['tgl_transaksi'] }}</td>
                                <td>{{ $data['kata_kunci'] }}</td>
                                <td>
                                    <div
                                        style="background-color:@if ($data['status'] == 'Sukses') #29cf00 @else #ff1c1c @endif; padding:5px 6px; border-radius:10px; color:white; text-align:center; width:60px;">
                                        {{ $data['status'] }}
                                    </div>
                                </td>
                                <td>{{ $data['pesan'] }}</td>
                                <td>{{ $data['eror'] }}</td>
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
                $('#table').DataTable();
            });
        </script>
    @endpush
@endsection
