@extends('admin.layout.main')
@section('menuDataProgram', 'active')

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
                                <th>Gambar</th>
                                <th>Nama Program</th>
                                <th>Tanggal Program</th>
                                <th>Lokasi Program</th>
                                <th>Deskripsi Program</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $data)
                                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{ route('data-program.update', $data->id) }}" method="POST"
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
                                                                <label>Nama Program</label>
                                                                <input type="text" name="nama_program"
                                                                    class="form-control @error('nama_program') is-invalid @enderror"
                                                                    value="{{ old('nama_program', $data->nama_program) }}"
                                                                    placeholder="Masukkan nama obat">
                                                                @error('nama_program')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Tanggal Mulai</label>
                                                                <input type="date" name="tanggal_mulai"
                                                                    class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                                                    value="{{ old('tanggal_mulai', $data->tanggal_mulai ?? '-') }}">
                                                                @error('tanggal_mulai')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Tanggal Akhir</label>
                                                                <input type="date" name="tanggal_akhir"
                                                                    class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                                                    value="{{ old('tanggal_akhir', $data->tanggal_akhir ?? '-') }}">
                                                                @error('tanggal_akhir')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Lokasi Program</label>
                                                                <input type="text" name="lokasi_program"
                                                                    class="form-control @error('lokasi_program') is-invalid @enderror"
                                                                    value="{{ old('lokasi_program', $data->lokasi_program) }}"
                                                                    placeholder="Masukkan nama obat">
                                                                @error('lokasi_program')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Deskripsi Program</label>
                                                        <textarea name="deskripsi_program" class="form-control @error('deskripsi_program') is-invalid @enderror" rows="5"
                                                            placeholder="Masukkan deskripsi program">{{ old('deskripsi_program', $data->deskripsi_program) }}</textarea>
                                                        @error('deskripsi_program')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Gambar Program</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="gambar_program"
                                                                class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
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
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($data->gambar_program)
                                            <img src="{{ asset('storage/program/' . $data->gambar_program) }}" alt="gambar"
                                                class="img-fluid" width="80">
                                        @else
                                            <img src="{{ asset('images/foto-profile.png') }}" alt="gambar"
                                                class="img-fluid" width="80">
                                        @endif
                                    </td>
                                    <td>{{ $data->nama_program ?? '-' }}</td>
                                    <td>{{ $data->tanggal_mulai ?? '-' }} - {{ $data->tanggal_akhir ?? '-' }}</td>
                                    <td>{{ $data->lokasi_program ?? '-' }}</td>
                                    <td>{{ $data->deskripsi_program ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('data-program.destroy', $data->id) }}" method="POST"
                                            class="d-flex" data-confirm-delete="true" data-confirm-title="Hapus Program!"
                                            data-confirm-text="Apakah kamu yakin untuk menghapus ini?">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal"
                                                data-target="#editModal{{ $data->id }}">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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
            <form action="{{ route('data-program.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label>Nama Program</label>
                                    <input type="text" name="nama_program"
                                        class="form-control @error('nama_program') is-invalid @enderror"
                                        value="{{ old('nama_program') }}" placeholder="Masukkan nama program">
                                    @error('nama_program')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai"
                                        class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                        value="{{ old('tanggal_mulai') }}" placeholder="Masukkan tanggal mulai program!">
                                    @error('tanggal_mulai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Akhir</label>
                                    <input type="date" name="tanggal_akhir"
                                        class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                        value="{{ old('tanggal_akhir') }}" placeholder="Masukkan tanggal akhir program!">
                                    @error('tanggal_akhir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Lokasi Program</label>
                                    <input type="text" name="lokasi_program"
                                        class="form-control @error('lokasi_program') is-invalid @enderror"
                                        value="{{ old('lokasi_program') }}" placeholder="Masukkan lokasi program">
                                    @error('lokasi_program')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi Program</label>
                            <textarea name="deskripsi_program" class="form-control @error('deskripsi_program') is-invalid @enderror" rows="5"
                                placeholder="Masukkan deskripsi program">{{ old('deskripsi_program') }}</textarea>
                            @error('deskripsi_program')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Gambar Program</label>
                            <div class="custom-file">
                                <input type="file" name="gambar_program" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose
                                    file</label>
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
