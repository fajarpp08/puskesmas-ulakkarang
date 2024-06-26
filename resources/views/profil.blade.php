@extends('layout.main')

@section('content')
    <!-- Detail Berita -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="mb-4">
                        <a href="#" class="h1 display-5">Profil Puskesmas Ulak Karang</a>
                    </div>
                    <div class="position-relative rounded overflow-hidden mb-3">
                        <img src="{{ asset('images/puskesmas-home.jpg') }}" class="img-zoomin img-fluid rounded w-100"
                            alt="">
                    </div>
                    {{-- <div class="d-flex justify-content-between">
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($beritas->tanggal_berita)->format('d-m-Y') }}</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-eye"></i> 3.5k Views</a>
                        <a href="#" class="text-dark link-hover me-3"><i class="fa fa-comment-dots"></i> 05
                            Comment</a>
                        <a href="#" class="text-dark link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                    </div> --}}
                    <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy Lorem Ipsum has been the industry's standard dummy type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book.
                    </p>
                    <p class="my-4">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                    </p>
                    <p class="my-4">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                    </p>
                    <p class="my-4">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Detail Berita -->
@endsection
