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
                <h3 class="box-title">Form Saldo Rekening - Operasional</h3>
            </div>

            <form role="form" method="POST" action="/saldo-operasional/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control"
                            value="{{ old('tgl_transaksi', \Carbon\Carbon::today()->format('Y-m-d')) }}"
                            id="tanggalTransaksi" name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>

                    </div>
                    <div class="form-group">
                        <label for="kdBank">Kode Bank</label>
                        <input type="number" maxlength="3" minlength="3" class="form-control" value="{{ old('kdbank') }}"
                            id="kdBank" name="kdbank" placeholder="Masukkan kode bank" required>
                    </div>
                    <div class="form-group">
                        <label for="noRekening">No. Rekening</label>
                        <input type="number" class="form-control" value="{{ old('no_rekening') }}" id="noRekening"
                            name="no_rekening" placeholder="Masukkan nomor rekening" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" value="{{ old('unit') }}" id="unit" name="unit"
                            placeholder="Masukkan unit" required>
                    </div>
                    <div class="form-group">
                        <label for="saldoAkhir">Saldo Akhir</label>
                        <input type="text" class="form-control" value="{{ old('saldo_akhir') }}" id="saldoAkhir"
                            name="saldo_akhir" placeholder="Masukkan saldo akhir" oninput="formatRibuan(this)" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function formatRibuan(input) {
            // Ambil nilai input sebagai string
            var value = input.value.toString();

            // Hapus semua karakter non-digit dari nilai input
            var cleanedValue = value.replace(/\D/g, '');

            // Format angka dengan tanda titik sebagai pemisah ribuan
            var formattedValue = formatNumber(cleanedValue);

            // Update nilai input dengan format yang diformat
            input.value = formattedValue;
        }

        function formatNumber(numberString) {
            // Format angka dengan tanda titik sebagai pemisah ribuan
            return numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    </script>
@endpush
