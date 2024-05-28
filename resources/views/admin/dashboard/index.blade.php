@extends('admin.layout.main')
@section('menuDashboard', 'active')

@section('content')
    {{-- @if (Auth()->user()->level == 'Admin') --}}
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $polis ?? '0' }}</h3>
                        <p>Poliklinik</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-bag"></i> --}}
                        <i class="ion ion-medkit"></i>
                    </div>
                    <a href="/data-poli" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $instalasis ?? '0' }}</h3>
                        <p>Instalasi</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-stats-bars"></i> --}}
                        <i class="ion ion-thermometer"></i>
                    </div>
                    <a href="/data-instalasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users ?? '0' }}</h3>
                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/data-user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $fasilitasis ?? '0' }}</h3>
                        <p>Fasilitas</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-pie-graph"></i> --}}
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/data-fasilitas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $strukturs ?? '0' }}</h3>
                        <p>Struktur</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-pie-graph"></i> --}}
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="/data-struktur" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $galeris ?? '0' }}</h3>
                        <p>Galeri</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-camera"></i>
                    </div>
                    <a href="/data-galeri" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $alurs ?? '0' }}</h3>
                        <p>Alur</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-stats-bars"></i> --}}
                        <i class="ion ion-key"></i>
                    </div>
                    <a href="/data-alur" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $pengumumans ?? '0' }}</h3>
                        <p>Pengumuman</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-bag"></i> --}}
                        <i class="ion ion-medkit"></i>
                    </div>
                    <a href="/data-pengumuman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $beritas ?? '0' }}</h3>
                        <p>Berita</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-edit"></i>
                    </div>
                    <a href="/data-berita" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $programs ?? '0' }}</h3>
                        <p>Program</p>
                    </div>
                    <div class="icon">
                        {{-- <i class="ion ion-bag"></i> --}}
                        <i class="ion ion-calendar"></i>
                    </div>
                    <a href="/data-pengumuman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

@endsection
{{-- @push('custom-script')
    <script>
        $(document).ready(function() {
            $('#selectJk').select2({
                theme: 'bootstrap4',
            });
            $('#selectPoli').select2({
                theme: 'bootstrap4',
            });
            $('#selectHari').select2({
                theme: 'bootstrap4',
            });
        });
    </script>

    <script>
        // Set default values for tgl_mulai and tgl_selesai to the first and last day of the current month
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const firstDay = new Date(today.getFullYear(), today.getMonth(), 1).toISOString().split('T')[0];
            const lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0).toISOString().split('T')[0];

            document.getElementById('tgl_mulai').value = firstDay;
            document.getElementById('tgl_selesai').value = lastDay;
        });
    </script>
@endpush --}}
