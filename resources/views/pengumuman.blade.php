@extends('layout.main')

@section('content')
    {{-- Pengumuman  --}}
    <div class="container-fluid populer-news pt-0 pb-5">
        <div class="container py-5">
            <div class="tab-class mb-4">
                <div class="mt-5 lifestyle">
                    <div class="text-center border-bottom mb-4">
                        <h1 class="display-5 mb-4">Pengumuman</h1>
                    </div>
                    <div class="row g-4">
                        @foreach ($pengumumans as $pengumuman)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="lifestyle-item rounded">
                                    <img src="{{ asset('storage/pengumuman/' . $pengumuman->gambar_pengumuman) }}"
                                        class="img-fluid w-100 rounded" alt=""
                                        style="height: 500px; object-fit: cover;">
                                    <div class="lifestyle-content">
                                        <div class="mt-auto">
                                            <a href="{{ route('pengumumanDetail', ['slug' => $pengumuman->slug]) }}"
                                                class="h4 text-white link-hover">{{ $pengumuman->nama_pengumuman }}</a>
                                            <div class="d-flex justify-content-between mt-4">
                                                <a class="small text-white"><i class="fa fa-eye"> Bacaan {{ $pengumuman->lama_pengumuman }}
                                                    menit</i></a>
                                                <small class="text-white d-block"><i
                                                        class="fas fa-calendar-alt me-1"></i>{{ \Carbon\Carbon::parse($pengumuman->tanggal_pengumuman)->format('d-m-Y') }}</small>
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
    {{-- Pengumuman  --}}
@endsection
