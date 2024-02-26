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
                <h3 class="box-title">Form Indeks Kepuasan Masyarakat (IKM)</h3>
            </div>

            <form role="form" method="POST" action="/ikm/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control" value="{{ old('tgl_transaksi') }}" id="tanggalTransaksi"
                            name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>
                    </div>

                    <div class="form-group">
                        <label for="nilaiIndeks">Nilai Indeks</label>
                        <input type="number" step="any" class="form-control" value="{{ old('nilai_indeks') }}"
                            id="nilaiIndeks" name="nilai_indeks" placeholder="Masukkan nilai indeks" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
