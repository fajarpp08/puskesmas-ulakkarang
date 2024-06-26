@extends('layout.main')

@section('content')
    {{-- Program  --}}
    <div class="container-fluid populer-news pt-0 pb-5">
        <div class="container py-5">
            <div class="tab-class mb-4">
                <div class="mt-5 lifestyle">
                    <div class="text-center border-bottom mb-4">
                        <h1 class="display-5 mb-4">Program</h1>
                    </div>
                    <div class="row g-4">
                        @foreach ($programs as $program)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="lifestyle-item rounded">
                                    <img src="{{ asset('storage/program/' . $program->gambar_program) }}"
                                        class="img-fluid w-100 rounded" alt=""
                                        style="height: 500px; object-fit: cover;">
                                    <div class="lifestyle-content">
                                        <div class="mt-auto">
                                            <a href="{{ route('programDetail', ['slug' => $program->slug]) }}"
                                                class="h4 text-white link-hover">{{ $program->nama_program }}</a>
                                            <div class="d-flex justify-content-between mt-4">
                                                {{-- <a class="small text-white"><i class="fa fa-eye"> Bacaan {{ $program->lama_program }}
                                                    menit</i></a> --}}
                                                <small class="text-white d-block"><i
                                                        class="fas fa-calendar-alt me-1"></i>{{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($program->tanggal_akhir)->format('d-m-Y') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Program  --}}
@endsection
