@extends('layouts.master')

@section('title')
    LAYANAN
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
                <h3 class="box-title">Form Jumlah BPJS dan Non-BPJS</h3>
            </div>

            <form role="form" method="POST" action="/pasien-bpjs-nonbpjs/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control"
                            value="{{ old('tgl_transaksi', \Carbon\Carbon::today()->format('Y-m-d')) }}"
                            id="tanggalTransaksi" name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>
                    </div>

                    <div class="form-group">
                        <label for="bpjs">Jumlah BPJS</label>
                        <input type="number" class="form-control" value="{{ old('jumlah_bpjs') }}" id="bpjs"
                            name="jumlah_bpjs" placeholder="Masukkan jumlah pasien BPJS" required>
                    </div>

                    <div class="form-group">
                        <label for="nonbpjs">Jumlah Non-BPJS</label>
                        <input type="number" class="form-control" value="{{ old('jumlah_non_bpjs') }}" id="nonbpjs"
                            name="jumlah_non_bpjs" placeholder="Masukkan jumlah pasien Non-BPJS" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
