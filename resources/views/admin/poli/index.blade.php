@extends('admin.layout.main')
@section('menuDataPoli', 'active')

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
                                <th>Nama Poli</th>
                                <th>Deskripsi Poli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($polis as $data)
                                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{ route('data-poli.update', $data->id) }}" method="POST"
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
                                                                <label>Nama Poli</label>
                                                                <input type="text" name="nama_poli"
                                                                    class="form-control @error('nama_poli') is-invalid @enderror"
                                                                    value="{{ old('nama_poli', $data->nama_poli) }}"
                                                                    placeholder="Masukkan nama obat">
                                                                @error('nama_poli')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Deskripsi Poli</label>
                                                        <textarea name="deskripsi_poli" class="form-control @error('deskripsi_poli') is-invalid @enderror" rows="5"
                                                            placeholder="Masukkan keterangan obat">{{ old('deskripsi_poli', $data->deskripsi_poli) }}</textarea>
                                                        @error('deskripsi_poli')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Gambar Poli</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="gambar_poli"
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
                                    {{-- <td>{{ $data->nama_poli ?? '-' }}</td> --}}
                                    <td>
                                        @if ($data->gambar_poli)
                                            <img src="{{ asset('storage/poli/' . $data->gambar_poli) }}" alt="gambar"
                                                class="img-fluid" width="80">
                                        @else
                                            <img src="{{ asset('images/foto-profile.png') }}" alt="gambar"
                                                class="img-fluid" width="80">
                                        @endif
                                    </td>
                                    <td>{{ $data->nama_poli ?? '-' }}</td>
                                    {{-- <td>Rp.{{ number_format($data->harga_obat, 0, ',', '.') }},-</td> --}}
                                    <td>{{ $data->deskripsi_poli ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('data-poli.destroy', $data->id) }}" method="POST" class="d-flex"
                                            data-confirm-delete="true" data-confirm-title="Hapus Poli!"
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
            <form action="{{ route('data-poli.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label>Nama Poli</label>
                                    <input type="text" name="nama_poli"
                                        class="form-control @error('nama_poli') is-invalid @enderror"
                                        value="{{ old('nama_poli') }}" placeholder="Masukkan nama poli">
                                    @error('nama_poli')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-lg">
                                <div class="mb-3">
                                    <label>Harga Obat</label>
                                    <input type="number" name="harga_obat"
                                        class="form-control @error('harga_obat') is-invalid @enderror"
                                        value="{{ old('harga_obat') }}" placeholder="Masukkan harga obat">
                                    @error('harga_obat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>
                        <div class="mb-3">
                            <label>Deskripsi Poliklinik</label>
                            <textarea name="deskripsi_poli" class="form-control @error('deskripsi_poli') is-invalid @enderror" rows="5"
                                placeholder="Masukkan deskripsi poli">{{ old('deskripsi_poli') }}</textarea>
                            @error('deskripsi_poli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Gambar Poli</label>
                            <div class="custom-file">
                                <input type="file" name="gambar_poli" class="custom-file-input" id="customFile">
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
