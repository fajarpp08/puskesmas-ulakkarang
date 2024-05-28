<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeris'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_galeri' => 'required',
            'deskripsi_galeri' => 'required',
            'gambar_galeri' => 'nullable',
        ], [
            'nama_galeri.required' => 'Nama Galeri harus diisi!',
            'deskripsi_galeri.required' => 'Deskripsi Galeri harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-galeri')->withErrors($validator)->withInput();
        }
        $galeris = $validator->valid();

        $galeris = new Galeri();
        $galeris->nama_galeri = $request->nama_galeri;
        $galeris->deskripsi_galeri = $request->deskripsi_galeri;

        if ($request->hasFile('gambar_galeri')) {
            $file = $request->file('gambar_galeri');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('galeri', $fileName, 'public');
            $galeris->gambar_galeri = $fileName;
        }
        // dd($galeris);

        $galeris->save();

        return redirect('/data-galeri')->with('message', 'Data Galeri berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $galeris = Galeri::findOrFail($id);

        $validatedData = $request->validate([
            'nama_galeri' => 'required',
            'deskripsi_galeri' => 'required',
            'gambar_galeri' => 'nullable',
        ], [
            'nama_galeri.required' => 'Nama Galeri harus diisi!',
            'deskripsi_galeri.required' => 'Deskripsi Galeri harus diisi',
        ]);

        $galeris->nama_galeri = $validatedData['nama_galeri'];
        $galeris->deskripsi_galeri = $validatedData['deskripsi_galeri'];

        if ($request->hasFile('gambar_galeri')) {
            $file = $request->file('gambar_galeri');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('galeri', $fileName, 'public');
            $galeris->gambar_galeri = $fileName;
        }
        // dd($galeris);
        $galeris->save();

        return redirect('/data-galeri')->with('message', 'Data Galeri berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Galeri::destroy($id);
        return redirect('/data-galeri')->with('message', 'Data Galeri berhasil dihapus!');
    }
}
