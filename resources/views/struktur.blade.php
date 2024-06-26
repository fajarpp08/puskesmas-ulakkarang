@extends('layout.main')

@section('content')
    <!-- Detail Berita -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="mb-4 text-center">
                        <a class="h1 display-5">Struktur di Puskesmas Ulak Karang</a>
                    </div>
                    @foreach ($strukturs as $struktur)
                        <div class="position-relative rounded overflow-hidden mb-3">
                            <img src="{{ asset('storage/struktur/' . $struktur->gambar_struktur) }}" class="img-fluid rounded w-100"
                                alt="">
                        </div>
                        <div class="my-4">
                            <a class="h4">{{ $struktur->nama_struktur }}</a>
                        </div>
                        <p class="my-4">{{ $struktur->deskripsi_struktur }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Detail Berita -->
@endsection
