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
                <h3 class="box-title">Form Jumlah Pasien Rawat Inap</h3>
            </div>

            <form role="form" method="POST" action="/pasien-ranap/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control" value="{{ old('tgl_transaksi') }}" id="tanggalTransaksi"
                            name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>
                    </div>

                    <div class="form-group">
                        <label for="kode_kelas">Kelas</label>
                        <select name="kode_kelas" id="kode_kelas" class="form-control" required>
                            <option value="">--- Pilih ---</option>
                            <option value="VVIP" {{ old('keterangan') == 'VVIP' ? 'selected' : '' }}>VVIP</option>
                            <option value="VIP" {{ old('keterangan') == 'VIP' ? 'selected' : '' }}>VIP
                            </option>
                            <option value="Kelas 1" {{ old('keterangan') == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                            <option value="Kelas 2" {{ old('keterangan') == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                            <option value="Kelas 3" {{ old('keterangan') == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                            {{-- <option value="VK" {{ old('keterangan') == 'VK' ? 'selected' : '' }}>VK</option>
                            <option value="PICU" {{ old('keterangan') == 'PICU' ? 'selected' : '' }}>PICU</option>
                            <option value="NICU" {{ old('keterangan') == 'NICU' ? 'selected' : '' }}>NICU</option>
                            <option value="ICU" {{ old('keterangan') == 'ICU' ? 'selected' : '' }}>ICU</option>
                            <option value="Isolasi" {{ old('keterangan') == 'Isolasi' ? 'selected' : '' }}>Isolasi</option>
                            <option value="Perinatologi" {{ old('keterangan') == 'Perinatologi' ? 'selected' : '' }}>
                                Perinatologi</option> --}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" value="{{ old('jumlah') }}" id="jumlah" name="jumlah"
                            placeholder="Masukkan jumlah pasien" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
