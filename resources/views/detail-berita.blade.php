@extends('layout.main')

@section('content')
    <!-- Detail Berita -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="mb-4">
                        <a href="#" class="h1 display-5">{{ $beritas->nama_berita }}</a>
                    </div>
                    <div class="position-relative rounded overflow-hidden mb-3">
                        <img src="{{ asset('storage/berita/' . $beritas->gambar_berita) }}"
                            class="img-zoomin img-fluid rounded w-100" alt=""
                            style="height: 900px; object-fit: cover;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($beritas->tanggal_berita)->format('d-m-Y') }}</a>
                        {{-- <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05
                            Comment</a>
                        <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a> --}}
                    </div>
                    <p class="my-4">{{ $beritas->deskripsi_berita }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Detail Berita -->


    <!-- Berita Lainnya -->
    <div class="container-fluid py-1">
        <div class="container py-1">
            <div class="row">
                <div class="col">
                    {{-- Other News --}}
                    <div class="bg-light rounded my-5 p-4">
                        <h4 class="mb-4">Berita Lainnya</h4>
                        <div class="row g-4">
                            @foreach ($beritasAll as $berita)
                                <div class="col-lg-20">
                                    <div class="d-flex align-items-center p-3 bg-white rounded">
                                        <img src="{{ asset('storage/berita/' . $berita->gambar_berita) }}"
                                            class="img-fluid rounded" alt=""
                                            style="height: 120px; width: 120px; object-fit: cover;">
                                        <div class="ms-3">
                                            <a href="{{ route('beritaDetail', ['slug' => $berita->slug]) }}"
                                                class="h5 mb-2">{{ $berita->nama_berita }}</a>
                                            <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> Bacaan
                                                {{ $berita->lama_berita }} menit</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- End Other News --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Berita Lainnya -->
@endsection
