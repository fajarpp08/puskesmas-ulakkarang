<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();

        return view('admin.berita.index', compact('beritas'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_berita' => 'required',
            'deskripsi_berita' => 'required',
            'gambar_berita' => 'nullable',
            'tanggal_berita' => 'required',
            'lama_berita' => 'required',
        ], [
            'nama_berita.required' => 'Nama Berita harus diisi!',
            'deskripsi_berita.required' => 'Deskripsi Berita harus diisi',
            'tanggal_berita.required' => 'Tanggal Berita harus diisi',
            'lama_berita.required' => 'Lama Bacaan Berita harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-berita')->withErrors($validator)->withInput();
        }
        $beritas = $validator->valid();
 
        $beritas = new Berita();
        $beritas->nama_berita = $request->nama_berita;
        $beritas->deskripsi_berita = $request->deskripsi_berita;
        $beritas->tanggal_berita = $request->tanggal_berita;
        $beritas->lama_berita = $request->lama_berita;

        if ($request->hasFile('gambar_berita')) {
            $file = $request->file('gambar_berita');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('berita', $fileName, 'public');
            $beritas->gambar_berita = $fileName;
        }
        // dd($beritas);

        $beritas->save();

        return redirect('/data-berita')->with('message', 'Data Berita berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $beritas = Berita::findOrFail($id);

        $validatedData = $request->validate([
            'nama_berita' => 'required',
            'deskripsi_berita' => 'required',
            'gambar_berita' => 'nullable',
            'tanggal_berita' => 'required',
            'lama_berita' => 'required',
        ], [
            'nama_berita.required' => 'Nama berita harus diisi!',
            'deskripsi_berita.required' => 'Deskripsi berita harus diisi!',
            'tanggal_berita.required' => 'Tanggal berita harus diisi!',
            'lama_berita.required' => 'Lama bacaan berita harus diisi!',
        ]);

        $beritas->nama_berita = $validatedData['nama_berita'];
        $beritas->deskripsi_berita = $validatedData['deskripsi_berita'];
        $beritas->tanggal_berita = $validatedData['tanggal_berita'];
        $beritas->lama_berita = $validatedData['lama_berita'];

        if ($request->hasFile('gambar_berita')) {
            $file = $request->file('gambar_berita');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('berita', $fileName, 'public');
            $beritas->gambar_berita = $fileName;
        }
        // dd($beritas);
        $beritas->save();

        return redirect('/data-berita')->with('message', 'Data Berita berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Berita::destroy($id);
        return redirect('/data-berita')->with('message', 'Data Berita berhasil dihapus!');
    }
}
