@extends('admin.layout.main')
@section('menuDataBerita', 'active')

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
                                <th>Judul Berita</th>
                                <th>Tanggal Berita</th>
                                <th>Lama Bacaan</th>
                                <th>Deskripsi Berita</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beritas as $data)
                                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{ route('data-berita.update', $data->id) }}" method="POST"
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
                                                                <label>Judul Berita</label>
                                                                <input type="text" name="nama_berita"
                                                                    class="form-control @error('nama_berita') is-invalid @enderror"
                                                                    value="{{ old('nama_berita', $data->nama_berita) }}"
                                                                    placeholder="Masukkan nama obat">
                                                                @error('nama_berita')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Tanggal Berita</label>
                                                                <input type="date" name="tanggal_berita"
                                                                    class="form-control @error('tanggal_berita') is-invalid @enderror"
                                                                    value="{{ old('tanggal_berita', $data->tanggal_berita ?? '-') }}">
                                                                @error('tanggal_berita')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Lama Bacaan</label>
                                                                <input type="number" name="lama_berita"
                                                                    class="form-control @error('lama_berita') is-invalid @enderror"
                                                                    value="{{ old('lama_berita', $data->lama_berita ?? '-') }}"
                                                                    placeholder="Masukkan lama bacaan berita berdasarkan menit!">
                                                                @error('lama_berita')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Deskripsi Berita</label>
                                                        <textarea name="deskripsi_berita" class="form-control @error('deskripsi_berita') is-invalid @enderror" rows="5"
                                                            placeholder="Masukkan deskripsi berita">{{ old('deskripsi_berita', $data->deskripsi_berita) }}</textarea>
                                                        @error('deskripsi_berita')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Gambar Berita</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="gambar_berita"
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
                                        @if ($data->gambar_berita)
                                            <img src="{{ asset('storage/berita/' . $data->gambar_berita) }}" alt="gambar"
                                                class="img-fluid" width="80">
                                        @else
                                            <img src="{{ asset('images/foto-profile.png') }}" alt="gambar"
                                                class="img-fluid" width="80">
                                        @endif
                                    </td>
                                    <td>{{ $data->nama_berita ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->tanggal_berita)->format('d-m-Y') }}</td>
                                    <td>{{ $data->lama_berita ?? '-' }} menit</td>
                                    <td>{{ $data->deskripsi_berita ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('data-berita.destroy', $data->id) }}" method="POST"
                                            class="d-flex" data-confirm-delete="true" data-confirm-title="Hapus Berita!"
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
            <form action="{{ route('data-berita.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label>Judul Berita</label>
                                    <input type="text" name="nama_berita"
                                        class="form-control @error('nama_berita') is-invalid @enderror"
                                        value="{{ old('nama_berita') }}" placeholder="Masukkan judul berita">
                                    @error('nama_berita')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Berita</label>
                                    <input type="date" name="tanggal_berita"
                                        class="form-control @error('tanggal_berita') is-invalid @enderror"
                                        value="{{ old('tanggal_berita') }}">
                                    @error('tanggal_berita')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Lama Bacaan</label>
                                    <input type="number" name="lama_berita"
                                        class="form-control @error('lama_berita') is-invalid @enderror"
                                        value="{{ old('lama_berita') }}"
                                        placeholder="Masukkan lama bacaan berita berdasarkan menit">
                                    @error('lama_berita')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi Berita</label>
                            <textarea name="deskripsi_berita" class="form-control @error('deskripsi_berita') is-invalid @enderror" rows="5"
                                placeholder="Masukkan deskripsi berita">{{ old('deskripsi_berita') }}</textarea>
                            @error('deskripsi_berita')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Gambar Berita</label>
                            <div class="custom-file">
                                <input type="file" name="gambar_berita" class="custom-file-input" id="customFile">
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
