<?php

namespace App\Http\Controllers;

use App\Models\Alur;
use App\Models\Poli;
use App\Models\User;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Struktur;
use App\Models\Fasilitas;
use App\Models\Instalasi;
use App\Models\Pengumuman;
use App\Models\Program;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // ADMIN
    public function dashboardAdmin()
    {
        return view(
            'admin.dashboard.index',
            [
                'users' => User::all()->count(),
                'polis' => Poli::all()->count(),
                'instalasis' => Instalasi::all()->count(),
                'fasilitasis' => Fasilitas::all()->count(),
                'strukturs' => Struktur::all()->count(),
                'galeris' => Galeri::all()->count(),
                'alurs' => Alur::all()->count(),
                'pengumumans' => Pengumuman::all()->count(),
                'beritas' => Berita::all()->count(),
                'programs' => Program::all()->count(),
            ]

        );
    }
    // instalasis
    // fasilitasis
    // strukturs
    // galeris
    // pengumumans
    // beritas
    // alurs
    // USER
    public function dashboardUser()
    {
        $beritaTerbaru = Berita::take(1)->latest('tanggal_berita')->first();
        $beritaShow = Berita::take(6)->get();
        return view('home',
            [
                'polis' => Poli::all(),
                'instalasis' => Instalasi::all(),
                'fasilitasis' => Fasilitas::all(),
                'strukturs' => Struktur::all(),
                'galeris' => Galeri::all(),
                'alurs' => Alur::all(),
                'pengumumans' => Pengumuman::all(),
                'berita' => Berita::all(),
                // 'beritaTerbarus' => Berita::latest()->first(),
                'beritaTerbaru' => $beritaTerbaru,
                'beritaShow' => $beritaShow
            ]
        );
    }
}
