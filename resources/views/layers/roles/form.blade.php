@extends('layouts.master')

@push('head')
@endpush

@section('title')
    USERS
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
                <h3 class="box-title">{{ isset($role) ? 'Edit Peran' : 'Tambah Peran' }}</h3>
            </div>

            <form id="multiselectForm" role="form" method="POST"
                action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}">
                @csrf

                @if (isset($role))
                    @method('PUT')
                @endif

                <div class="box-body">
                    <div class="form-group">
                        <label for="role">Peran</label>
                        <input type="text" class="form-control" value="{{ isset($role) ? $role->name : old('role') }}"
                            id="role" name="role" placeholder="Masukkan nama peran" required>
                    </div>

                    <div class="form-group">
                        <label for="permissions">Izin</label>
                        <select class="form-control" id="permissions" multiple name="permissions[]" required>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}"
                                    {{ isset($rolePermissions) && in_array($permission->id, $rolePermissions) ? 'selected' : '' }}>
                                    {{ $permission->name }}</option>
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

@push('scripts')
    <script></script>
@endpush
