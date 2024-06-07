@extends('layouts.master')

@section('title')
    SDM
@endsection

@section('content')
    <section class="content">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>{{ session('message') ? session('message') : 'Data gagal disimpan' }}!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Jumlah Perawat</h3>
            </div>

            <form role="form" method="POST" action="/perawat/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control"
                            value="{{ old('tgl_transaksi', \Carbon\Carbon::today()->format('Y-m-d')) }}"
                            id="tanggalTransaksi" name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>

                    </div>
                    <div class="form-group">
                        <label for="pns">PNS</label>
                        <input type="number" class="form-control" value="{{ old('pns') }}" id="pns" name="pns"
                            placeholder="Masukkan jumlah PNS" required>
                    </div>
                    <div class="form-group">
                        <label for="pppk">PPPK</label>
                        <input type="number" class="form-control" value="{{ old('pppk') }}" id="pppk" name="pppk"
                            placeholder="Masukkan jumlah PPPK" required>
                    </div>
                    <div class="form-group">
                        <label for="anggota">Anggota</label>
                        <input type="number" class="form-control" value="{{ old('anggota') }}" id="anggota"
                            name="anggota" placeholder="Masukkan jumlah anggota" required>
                    </div>
                    <div class="form-group">
                        <label for="nonpns">Non PNS Tetap</label>
                        <input type="number" class="form-control" value="{{ old('non_pns_tetap') }}" id="nonpns"
                            name="non_pns_tetap" placeholder="Masukkan jumlah Non PNS Tetap" required>
                    </div>
                    <div class="form-group">
                        <label for="kontrak">Kontrak</label>
                        <input type="number" class="form-control" value="{{ old('kontrak') }}" id="kontrak"
                            name="kontrak" placeholder="Masukkan jumlah kontrak" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
