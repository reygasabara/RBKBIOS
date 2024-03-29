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
                <h3 class="box-title">BOR (Bed Occupancy Ratio)</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <a href="/bor/input" class="btn btn-success">Input</a>
                        </div>
                    </div>
                </div>

                <div>
                    <h6 class="text-right">
                        <strong><em>*Data dikirimkan per periode bulanan</em></strong>
                    </h6>
                </div>
            </div>

            <div class="box-body">
                <table class="table-dark table" id="table">
                    <thead>
                        <tr>
                            <th>Tanggak Transaksi</th>
                            <th>BOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data['tgl_transaksi'] }}</td>
                                <td>{{ $data['bor'] }}</td>
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
