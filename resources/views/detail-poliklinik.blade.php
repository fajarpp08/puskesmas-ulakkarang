@extends('layout.main')

@section('content')
    <!-- Detail Poliklinik -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="mb-4">
                        <a href="#" class="h1 display-5">{{ $polis->nama_poli }}</a>
                    </div>
                    <div class="position-relative rounded overflow-hidden mb-3">
                        <img src="{{ asset('storage/poli/' . $polis->gambar_poli) }}"
                            class="img-fluid rounded w-100" alt=""
                            style="height: 100%; object-fit: cover;">
                    </div>
                    {{-- <div class="d-flex justify-content-between">
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($polis->tanggal_poli)->format('d-m-Y') }}</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05
                            Comment</a>
                        <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                    </div> --}}
                    <p class="my-4">{{ $polis->deskripsi_poli }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Detail Poliklinik -->


    <!-- Poliklinik Lainnya -->
    <div class="container-fluid py-1">
        <div class="container py-1">
            <div class="row">
                <div class="col">
                    {{-- Other Poliklinik --}}
                    <div class="bg-light rounded my-5 p-4">
                        <h4 class="mb-4">Poliklinik Lainnya</h4>
                        <div class="row g-4">
                            @foreach ($polisAll as $poli)
                                <div class="col-lg-20">
                                    <div class="d-flex align-items-center p-3 bg-white rounded">
                                        <img src="{{ asset('storage/poli/' . $poli->gambar_poli) }}"
                                            class="img-fluid rounded" alt=""
                                            style="height: 120px; width: 120px; object-fit: cover;">
                                        <div class="ms-3">
                                            <a href="{{ route('poliklinikDetail', ['slug' => $poli->slug]) }}"
                                                class="h5 mb-2">{{ $poli->nama_poli }}</a>
                                            {{-- <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> Bacaan
                                                {{ $poli->lama_poli }} menit</p> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- End Other Poliklinik --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Poliklinik Lainnya -->
@endsection
