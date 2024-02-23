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
                <h3 class="box-title">Form Jumlah Pelayanan Dokpol</h3>
            </div>

            <form role="form" method="POST" action="/dokpol/submit">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="tanggalTransaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control" value="{{ old('tgl_transaksi') }}" id="tanggalTransaksi"
                            name="tgl_transaksi" placeholder="Masukkan tanggal transaksi" required>
                    </div>

                    <div class="form-group">
                        <label for="kedokteranForensik">Kedokteran Forensik</label>
                        <input type="number" class="form-control" value="{{ old('kedokteran_forensik') }}"
                            id="kedokteranForensik" name="kedokteran_forensik" placeholder="Masukkan jumlah layanan"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="psikiatriForensik">Psikiatri Forensik</label>
                        <input type="number" class="form-control" value="{{ old('psikiatri_forensik') }}"
                            id="psikiatriForensik" name="psikiatri_forensik" placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="sentraVisumdanMedikolegal">Sentra Visum dan Medikolegal</label>
                        <input type="number" class="form-control" value="{{ old('sentra_visum_dan_medikolegal') }}"
                            id="sentraVisumdanMedikolegal" name="sentra_visum_dan_medikolegal"
                            placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="ppat">PPAT</label>
                        <input type="number" class="form-control" value="{{ old('ppat') }}" id="ppat" name="ppat"
                            placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="odontologiForensik">Odontologi Forensik</label>
                        <input type="number" class="form-control" value="{{ old('odontologi_forensik') }}"
                            id="odontologiForensik" name="odontologi_forensik" placeholder="Masukkan jumlah layanan"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="psikologiForensik">Psikologi Forensik</label>
                        <input type="number" class="form-control" value="{{ old('psikologi_forensik') }}"
                            id="psikologiForensik" name="psikologi_forensik" placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="antropologiForensik">Antropologi Forensik</label>
                        <input type="number" class="form-control" value="{{ old('antropologi_forensik') }}"
                            id="antropologiForensik" name="antropologi_forensik" placeholder="Masukkan jumlah layanan"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="olahTKPMedis">Olah TKP Medis</label>
                        <input type="number" class="form-control" value="{{ old('olah_tkp_medis') }}" id="olahTKPMedis"
                            name="olah_tkp_medis" placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="kesehatanTahanan">Kesehatan Tahanan</label>
                        <input type="number" class="form-control" value="{{ old('kesehatan_tahanan') }}"
                            id="kesehatanTahanan" name="kesehatan_tahanan" placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="narkoba">Narkoba</label>
                        <input type="number" class="form-control" value="{{ old('narkoba') }}" id="narkoba"
                            name="narkoba" placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="toksikologiMedik">Toksikologi Medik</label>
                        <input type="number" class="form-control" value="{{ old('toksikologi_medik') }}"
                            id="toksikologiMedik" name="toksikologi_medik" placeholder="Masukkan jumlah layanan">
                    </div>

                    <div class="form-group">
                        <label for="pelayananDNA">Pelayanan DNA</label>
                        <input type="number" class="form-control" value="{{ old('pelayanan_dna') }}" id="pelayananDNA"
                            name="pelayanan_dna" placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="pamKeslapFoodSecurity">PAM Keslap Food Security</label>
                        <input type="number" class="form-control" value="{{ old('pam_keslap_food_security') }}"
                            id="pamKeslapFoodSecurity" name="pam_keslap_food_security"
                            placeholder="Masukkan jumlah layanan" required>
                    </div>

                    <div class="form-group">
                        <label for="dvi">DVI</label>
                        <input type="number" class="form-control" value="{{ old('dvi') }}" id="dvi"
                            name="dvi" placeholder="Masukkan jumlah layanan" required>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
