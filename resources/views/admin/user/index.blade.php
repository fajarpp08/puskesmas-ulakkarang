@extends('admin.layout.main')
@section('menuDataUser', 'active')
@section('content')
    <div class="row">
        <div class="col-lg">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <button type="submit" class="btn btn-sm btn-default" data-toggle="modal" data-target="#tambahModal">
                        <i class="fas fa-plus"></i>
                        Tambahkan Data
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama ?? '-' }}</td>
                                    <td>{{ $user->username ?? '-' }}</td>
                                    <td>{{ $user->role ?? '-' }}</td>

                                    <td>
                                        <form action="{{ route('data-user.destroy', $user->id) }}" method="POST" class="d-flex"
                                            data-confirm-delete="true" data-confirm-title="Hapus User!"
                                            data-confirm-text="Apakah kamu yakin untuk menghapus ini?">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal"
                                                data-target="#editModal{{ $user->id }}">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                        {{-- edit modal --}}
                                        <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <form action="{{ route('data-user.update', $user->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg">
                                                                    <div class="mb-3">
                                                                        <label>Nama</label>
                                                                        <input type="text" name="nama"
                                                                            class="form-control @error('nama') is-invalid @enderror"
                                                                            value="{{ old('nama', $user->nama ?? '-') }}"
                                                                            placeholder="Masukkan nama">
                                                                        @error('nama')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Username</label>
                                                                        <input type="text" name="username"
                                                                            class="form-control @error('username') is-invalid @enderror"
                                                                            value="{{ old('username', $user->username ?? '-') }}"
                                                                            placeholder="Masukkan username">
                                                                        @error('username')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Password</label>
                                                                        <input type="text" name="password"
                                                                            class="form-control @error('password') is-invalid @enderror"
                                                                            value="{{ old('password' ?? '-') }}"
                                                                            placeholder="Masukkan password">
                                                                        @error('password')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label>Role</label>
                                                                        <select name="role"
                                                                            class="form-control @error('role') is-invalid @enderror"
                                                                            style="width: 100%;" id="selectRole"
                                                                            value="{{ old('role') }}">
                                                                            <option value="" selected>-- Pilih Role --
                                                                            </option>
                                                                            <option value="Admin">Admin</option>
                                                                            {{-- <option value="{{ $row->id }}"
                                                                                    {{ $row->id == $data->hari_id ? 'selected' : '' }}>
                                                                                    {{ $row->nama_hari ?? '-' }}</option> --}}
                                                                        </select>
                                                                    </div>
                                                                    {{-- <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Role</label>
                                                                        <select class="form-control @error('role') is-invalid @enderror"
                                                                            value="{{ old('role') }}" name="role" id="exampleFormControlInput1">
                                                                            <option value="">-- Pilih Role --</option>
                                                                            <option value="Admin" @if ($users->status == 'Admin') selected @endif>Admin</option>
                                                                            <option value="User" @if ($users->status == 'User') selected @endif>User</option>
                                                                        </select>
                                                                        @error('role')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div> --}}
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                data-dismiss="modal">
                                                                <i class="fas fa-times"></i>
                                                                Batal
                                                            </button>
                                                            <button type="submit" class="btn btn-sm btn-success">
                                                                <i class="fas fa-plus"></i>
                                                                Simpan Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--  Tambahkan Data  --}}
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('data-user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}" placeholder="Masukkan nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Username</label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}" placeholder="Masukkan Username">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="text" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}" placeholder="Masukkan password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Role</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror"
                                        style="width: 100%;" id="selectRole">
                                        <option value="" selected>Pilih Role</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                <i class="fas fa-times"></i>
                                Batal
                            </button>
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i>
                                Simpan Data
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            $('#selectPoli').select2({
                theme: 'bootstrap4',
                dropdownParent: $('#tambahModal .modal-content')
            });
            $('#selectRole').select2({
                theme: 'bootstrap4',
                dropdownParent: $('#tambahModal .modal-content')
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-confirm-delete]').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const title = form.dataset.confirmTitle || 'Konfirmasi Hapus!';
                    const text = form.dataset.confirmText ||
                        'Apakah kamu yakin untuk menghapus ini?';

                    Swal.fire({
                        title: title,
                        text: text,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
