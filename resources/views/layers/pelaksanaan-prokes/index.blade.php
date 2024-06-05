@extends('layouts.master')

@section('title')
    IKT
@endsection

@section('content')
    <section class="content">
        <div class="box" style="position: relative">
            <div class="box-header with-border">
                <h3 class="box-title">Kepatuhan Pelaksanaan Protokol Kesehatan</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <a href="/kepatuhan-pelaksanaan-prokes/input" class="btn btn-success">Input</a>
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
                            <strong><em>*Data dikirimkan per periode triwulanan (tidak bersifat akumulatif)</em></strong>
                        </h6>
                    </div>

                </div>
            </div>
            <div class="box-body">
                <table class="table-dark table" id="table">
                    <thead>
                        <tr>
                            <th>Tanggak Transaksi</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data['tgl_transaksi'] }}</td>
                                <td>{{ $data['jumlah'] }}</td>
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
            let satker = "651650";
            let key = "env('TOKEN_KEY')";

            $(function() {
                $('#table').DataTable();
            });
        </script>
    @endpush
@endsection
