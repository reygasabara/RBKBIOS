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
                <h3 class="box-title">Form Jumlah Layanan Laboratorium (Sampel)</h3>
            </div>

            <form role="form" method="POST" action="/lab-sampel/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control"
                            value="{{ old('tgl_transaksi', \Carbon\Carbon::today()->format('Y-m-d')) }}"
                            id="tanggalTransaksi" name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" value="{{ old('jumlah') }}" id="jumlah" name="jumlah"
                            placeholder="Masukkan jumlah layanan" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
