@extends('layouts.master')

@section('title')
    KEUANGAN
@endsection

@section('content')
    <section class="content">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>{{ session('message') ? session('message') : 'Ada kolom yang belum diisi' }}!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Saldo Rekening - Pengelolaan Kas</h3>
            </div>

            <form role="form" method="POST" action="/saldo-pengelolaan-kas/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control" value="{{ old('tgl_transaksi') }}" id="tanggalTransaksi"
                            name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>

                    </div>
                    <div class="form-group">
                        <label for="noBilyet">No. Bilyet</label>
                        <input type="text" class="form-control" value="{{ old('no_bilyet') }}" id="noBilyet"
                            name="no_bilyet" placeholder="Masukkan nomor bilyet" required>
                    </div>
                    <div class="form-group">
                        <label for="nilaiDeposito">Nilai Deposito</label>
                        <input type="text" class="form-control" value="{{ old('nilai_deposito') }}" id="nilaiDeposito"
                            name="nilai_deposito" placeholder="Masukkan nilai deposito" required>
                    </div>
                    <div class="form-group">
                        <label for="nilaiBunga">Nilai Bunga</label>
                        <input type="number" class="form-control" value="{{ old('nilai_bunga') }}" id="nilaiBunga"
                            name="nilai_bunga" placeholder="Masukkan jumlah uang" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
