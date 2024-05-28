@extends('admin.layout.main')
@section('menuDataAlur', 'active')

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
                                <th>Nama Alur</th>
                                <th>Deskripsi Alur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alurs as $data)
                                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{ route('data-alur.update', $data->id) }}" method="POST"
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
                                                                <label>Nama Alur</label>
                                                                <input type="text" name="nama_alur"
                                                                    class="form-control @error('nama_alur') is-invalid @enderror"
                                                                    value="{{ old('nama_alur', $data->nama_alur) }}"
                                                                    placeholder="Masukkan nama obat">
                                                                @error('nama_alur')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Deskripsi Alur</label>
                                                        <textarea name="deskripsi_alur" class="form-control @error('deskripsi_alur') is-invalid @enderror" rows="5"
                                                            placeholder="Masukkan keterangan obat">{{ old('deskripsi_alur', $data->deskripsi_alur) }}</textarea>
                                                        @error('deskripsi_alur')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Gambar Alur</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="gambar_alur"
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
                                        @if ($data->gambar_alur)
                                            <img src="{{ asset('storage/alur/' . $data->gambar_alur) }}" alt="gambar"
                                                class="img-fluid" width="80">
                                        @else
                                            <img src="{{ asset('images/foto-profile.png') }}" alt="gambar"
                                                class="img-fluid" width="80">
                                        @endif
                                    </td>
                                    <td>{{ $data->nama_alur ?? '-' }}</td>
                                    <td>{{ $data->deskripsi_alur ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('data-alur.destroy', $data->id) }}" method="POST" class="d-flex"
                                            data-confirm-delete="true" data-confirm-title="Hapus Alur!"
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
            <form action="{{ route('data-alur.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label>Nama Alur</label>
                                    <input type="text" name="nama_alur"
                                        class="form-control @error('nama_alur') is-invalid @enderror"
                                        value="{{ old('nama_alur') }}" placeholder="Masukkan nama alur">
                                    @error('nama_alur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi Alur</label>
                            <textarea name="deskripsi_alur" class="form-control @error('deskripsi_alur') is-invalid @enderror" rows="5"
                                placeholder="Masukkan deskripsi alur">{{ old('deskripsi_alur') }}</textarea>
                            @error('deskripsi_alur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Gambar Alur</label>
                            <div class="custom-file">
                                <input type="file" name="gambar_alur" class="custom-file-input" id="customFile">
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
