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
                <h3 class="box-title">Form Jumlah Pasien Rawat Jalan/Poli</h3>
            </div>

            <form role="form" method="POST" action="/pasien-ralan-poli/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control"
                            value="{{ old('tgl_transaksi', \Carbon\Carbon::today()->format('Y-m-d')) }}"
                            id="tanggalTransaksi" name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>
                    </div>

                    <div class="form-group">
                        <label for="namaPoli">Nama Poli</label>
                        <select name="nama_poli" id="namaPoli" class="form-control" required>
                            <option value="">--- Pilih ---</option>
                            <option value="Anak" {{ old('nama_poli') == 'Anak' ? 'selected' : '' }}>Anak
                            </option>
                            <option value="Bedah Umum" {{ old('nama_poli') == 'Bedah Umum' ? 'selected' : '' }}>
                                Bedah Umum
                            </option>
                            <option value="Fisioterapi" {{ old('nama_poli') == 'Fisioterapi' ? 'selected' : '' }}>
                                Fisioterapi
                            </option>
                            <option value="Gigi" {{ old('nama_poli') == 'Gigi' ? 'selected' : '' }}>
                                Gigi
                            </option>
                            <option value="Interna" {{ old('nama_poli') == 'Interna' ? 'selected' : '' }}>
                                Interna
                            </option>
                            <option value="Jantung" {{ old('nama_poli') == 'Jantung' ? 'selected' : '' }}>Jantung
                            </option>
                            <option value="Kulit dan Kelamin"
                                {{ old('nama_poli') == 'Kulit dan Kelamin' ? 'selected' : '' }}>Kulit dan Kelamin
                            </option>
                            <option value="Mata" {{ old('nama_poli') == 'Mata' ? 'selected' : '' }}>Mata
                            </option>
                            <option value="Obgyn" {{ old('nama_poli') == 'Obgyn' ? 'selected' : '' }}>Obgyn
                            </option>
                            <option value="Ortopedi" {{ old('nama_poli') == 'Ortopedi' ? 'selected' : '' }}>
                                Ortopedi
                            </option>
                            <option value="Paru" {{ old('nama_poli') == 'Paru' ? 'selected' : '' }}>
                                Paru
                            </option>
                            <option value="Saraf" {{ old('nama_poli') == 'Saraf' ? 'selected' : '' }}>
                                Saraf
                            </option>
                            <option value="THT" {{ old('nama_poli') == 'THT' ? 'selected' : '' }}>THT
                            </option>
                            <option value="Umum" {{ old('nama_poli') == 'Umum' ? 'selected' : '' }}>
                                Umum
                            </option>
                            <option value="Urologi" {{ old('nama_poli') == 'Urologi' ? 'selected' : '' }}>Urologi
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" value="{{ old('jumlah') }}" id="jumlah"
                            name="jumlah" placeholder="Masukkan jumlah pasien" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
