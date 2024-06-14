@extends('layouts.master')

@section('title')
    IKT
@endsection

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Status Pengiriman Data</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <form id="runCommand" action="/run-command" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success"><i class="fa fa-play" aria-hidden="true"
                                        style="margin-right: 3px;"></i>
                                    Kirim data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body" style="margin-top: 40px">
                <table class="table-dark table" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Pembaruan</th>
                            <th>Modul</th>
                            <th>Jenis Data</th>
                            <th>Jadwal Pengiriman</th>
                            <th>Status</th>
                            <th>Pengiriman Selanjutnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $data['updated_at'] }}</td>
                                <td>{{ $data['modul'] }}</td>
                                <td>{{ $data['jenis_data'] }}</td>
                                <td>{{ $data['jadwal_pengiriman'] }}</td>
                                <td>
                                    <div
                                        style="background-color:@if ($data['status'] == 'Telah diperbarui') #29cf00 @elseif ($data['status'] == 'Diperbarui sebagian') #b8b502 @elseif ($data['status'] == 'Gagal diperbarui') #fc7d05 @else #ff1c1c @endif; padding:5px 6px; border-radius:10px; color:white; text-align:center; width:140px;">
                                        {{ $data['status'] }}
                                    </div>
                                </td>
                                <td>{{ $data['pengiriman_selanjutnya'] }}</td>
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

        <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
        <script>
            $('#runCommand').click(function(event) {
                Swal.fire({
                    title: 'Harap tunggu!',
                    html: 'Data sedang dalam proses pengiriman...<br><h1><i class="fa fa-spinner fa-spin text-primary"></i></h1> ',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });
            });
        </script>
    @endpush
@endsection
