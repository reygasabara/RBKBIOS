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
                <h3 class="box-title">{{ isset($user) ? 'Edit Pengguna' : 'Registrasi Pengguna' }}</h3>
            </div>

            <form role="form" method="POST"
                action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}">
                @csrf

                @if (isset($user))
                    @method('PUT')
                @endif

                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" value="{{ isset($user) ? $user->name : old('name') }}"
                            id="name" name="name" placeholder="Masukkan nama user" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control"
                            value="{{ isset($user) ? $user->username : old('username') }}" id="username" name="username"
                            placeholder="Masukkan username" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}"
                            id="email" name="email" placeholder="Masukkan email user" required>
                    </div>

                    @if (!isset($user))
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" minlength="8" value="{{ old('password') }}"
                                id="password" name="password" placeholder="Masukkan password user" required>
                        </div>

                        <div class="form-group">
                            <label for="passwordConfirmation">Konfirmasi Password</label>
                            <input type="password" class="form-control" minlength="8"
                                value="{{ old('password_confirmation') }}" id="password" name="password_confirmation"
                                placeholder="Masukkan kembali password user" required>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="roles">Peran</label>
                        <select name="roles[]" id="roles" class="form-control" required>
                            <option value="">--- Pilih ---</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" @if (isset($userRoles) && in_array($role->name, $userRoles)) selected @endif>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
