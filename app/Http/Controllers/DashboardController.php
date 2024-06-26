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

    // USER
    public function dashboardUser()
    {
        $beritaTerbaru = Berita::take(1)->latest('tanggal_berita')->first();
        $beritaShow = Berita::take(6)->get();
        // $beritaFooter = Berita::take(2)->get();
        // $galeriFooter = Galeri::take(6)->latest()->get();
        $galeri = Galeri::take(8)->latest()->get();
        return view(
            'home',
            [
                'polis' => Poli::all(),
                'instalasis' => Instalasi::all(),
                'fasilitasis' => Fasilitas::all(),
                'strukturs' => Struktur::all(),
                // 'galeris' => Galeri::all(),
                'alurs' => Alur::all(),
                'pengumumans' => Pengumuman::all(),
                // 'beritaTerbarus' => Berita::latest()->first(),
                'galeri' => $galeri,
                'beritaTerbaru' => $beritaTerbaru,
                'beritaShow' => $beritaShow,
                // 'beritaFooter' => $beritaFooter,
                // 'galeriFooter' => $galeriFooter,

            ]
        );
    }

    public function footer()
    {
        $beritaFooter = Berita::take(2)->get();
        $galeriFooter = Galeri::take(6)->latest()->get();
        return view(
            'layout.main',
            [
                'beritaFooter' => $beritaFooter,
                'galeriFooter' => $galeriFooter,

            ]
        );
    }

    public function berita()
    {
        $beritas = Berita::all();
        return view('berita', compact('beritas'));
    }
    public function beritaDetail($slug)
    {
        // $beritas = Berita::where('slug', $slug)->firstOrFail();
        // return view('detail-berita', compact('beritas'));
        $beritas = Berita::where('slug', $slug)->firstOrFail();
        $beritasAll = Berita::where('id', '!=', $beritas->id)->get();
        return view('detail-berita', compact('beritas', 'beritasAll'));
    }
    public function profil()
    {
        return view('profil');
    }
    public function sejarah()
    {
        return view('sejarah');
    }
    public function poliklinik()
    {
        $polis = Poli::all();
        return view('poliklinik', compact('polis'));
    }
    public function poliklinikDetail($slug)
    {
        $polis = Poli::where('slug', $slug)->firstOrFail();
        $polisAll = Poli::where('id', '!=', $polis->id)->get();
        return view('detail-poliklinik', compact('polis', 'polisAll'));
    }
    public function instalasi()
    {
        $instalasis = Instalasi::all();
        return view('instalasi', compact('instalasis'));
    }
    public function alur()
    {
        $alurs = Alur::all();
        return view('alur', compact('alurs'));
    }
    public function program()
    {
        $programs = Program::all();
        return view('program', compact('programs'));
    }
    public function programDetail($slug)
    {
        $programs = Program::where('slug', $slug)->firstOrFail();
        $programsAll = Program::where('id', '!=', $programs->id)->get();
        return view('detail-program', compact('programs', 'programsAll'));
    }
    public function struktur()
    {
        $strukturs = Struktur::all();
        return view('struktur', compact('strukturs'));
    }
    public function galeri()
    {
        $galeri = Galeri::all();
        return view('detail-galeri', compact('galeri'));
    }
    public function pengumuman()
    {
        $pengumumans = Pengumuman::all();
        return view('pengumuman', compact('pengumumans'));
    }
    public function pengumumanDetail($slug)
    {
        $pengumumans = Pengumuman::where('slug', $slug)->firstOrFail();
        $pengumumansAll = Pengumuman::where('id', '!=', $pengumumans->id)->get();
        return view('detail-pengumuman', compact('pengumumans', 'pengumumansAll'));
    }
}
