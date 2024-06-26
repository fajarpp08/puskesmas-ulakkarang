@extends('layout.main')

@section('content')
    <!-- Detail Berita -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="mb-4 text-center">
                        <a class="h1 display-5">Alur di Puskesmas Ulak Karang</a>
                    </div>
                    @foreach ($alurs as $alur)
                        <div class="position-relative rounded overflow-hidden mb-3">
                            <img src="{{ asset('storage/alur/' . $alur->gambar_alur) }}" class="img-fluid rounded w-100"
                                alt="">
                        </div>
                        <div class="my-4">
                            <a class="h4">{{ $alur->nama_alur }}</a>
                        </div>
                        <p class="my-4">{{ $alur->deskripsi_alur }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Detail Berita -->
@endsection
