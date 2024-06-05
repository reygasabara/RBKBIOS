@extends('layouts.master')

@push('head')
    <style>
        .swal2-popup {
            font-size: 1.3rem !important;
        }
    </style>
@endpush

@section('title')
    Users
@endsection

@section('content')
    <section class="content">
        <div class="box" style="position: relative">
            <div class="box-header with-border">
                <h3 class="box-title">Data Peran</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-btn">
                            <a href="/roles/create" class="btn btn-success">Input</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-body" style="margin-top: 20px;">
                <table class="table-dark table" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Peran</th>
                            <th class="text-center">Izin</th>
                            <th class="text-center" style="width: 110px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td style="text-align: justify">
                                    @foreach ($role->permissions as $permission)
                                        {{ $permission->name }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="roles/{{ $role['id'] }}/edit" class="btn btn-success">Edit</a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                        style="display:inline;" data-confirm-delete="true">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(function() {
                $('#table').DataTable()
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteForms = document.querySelectorAll('form[data-confirm-delete]');

                deleteForms.forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Anda tidak akan bisa mengembalikan ini!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal',
                            width: '500px'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form
                                    .submit(); // Lanjutkan dengan penghapusan jika pengguna mengonfirmasi
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
@endsection
