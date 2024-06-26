@extends('layout.main')

@section('content')
    <!-- Detail Program -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="mb-4">
                        <a href="#" class="h1 display-5">{{ $programs->nama_program }}</a>
                    </div>
                    <div class="position-relative rounded overflow-hidden mb-3">
                        <img src="{{ asset('storage/program/' . $programs->gambar_program) }}"
                            class="img-fluid rounded w-100" alt=""
                            style="height: 900px; object-fit: cover;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($programs->tanggal_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($programs->tanggal_akhir)->format('d-m-Y') }}</a>
                        {{-- <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05
                            Comment</a>
                        <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a> --}}
                    </div>
                    <p class="my-4">{{ $programs->deskripsi_program }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Detail Program -->


    <!-- Program Lainnya -->
    <div class="container-fluid py-1">
        <div class="container py-1">
            <div class="row">
                <div class="col">
                    {{-- Other Program --}}
                    <div class="bg-light rounded my-5 p-4">
                        <h4 class="mb-4">Program Lainnya</h4>
                        <div class="row g-4">
                            @foreach ($programsAll as $program)
                                <div class="col-lg-20">
                                    <div class="d-flex align-items-center p-3 bg-white rounded">
                                        <img src="{{ asset('storage/program/' . $program->gambar_program) }}"
                                            class="img-fluid rounded" alt=""
                                            style="height: 120px; width: 120px; object-fit: cover;">
                                        <div class="ms-3">
                                            <a href="{{ route('programDetail', ['slug' => $program->slug]) }}"
                                                class="h5 mb-2">{{ $program->nama_program }}</a>
                                            <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i> 
                                                {{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($program->tanggal_akhir)->format('d-m-Y') }}    
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- End Other Program --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Program Lainnya -->
@endsection
