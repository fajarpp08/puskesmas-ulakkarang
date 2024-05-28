<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StrukturController extends Controller
{
    public function index()
    {
        $strukturs = Struktur::latest()->get();

        return view('admin.struktur.index', compact('strukturs'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_struktur' => 'required',
            'deskripsi_struktur' => 'required',
            'gambar_struktur' => 'nullable',
        ], [
            'nama_struktur.required' => 'Nama Struktur harus diisi!',
            'deskripsi_struktur.required' => 'Deskripsi Struktur harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-struktur')->withErrors($validator)->withInput();
        }
        $strukturs = $validator->valid();

        $strukturs = new Struktur();
        $strukturs->nama_struktur = $request->nama_struktur;
        $strukturs->deskripsi_struktur = $request->deskripsi_struktur;

        if ($request->hasFile('gambar_struktur')) {
            $file = $request->file('gambar_struktur');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('struktur', $fileName, 'public');
            $strukturs->gambar_struktur = $fileName;
        }
        // dd($strukturs);

        $strukturs->save();

        return redirect('/data-struktur')->with('message', 'Data Struktur berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $strukturs = Struktur::findOrFail($id);

        $validatedData = $request->validate([
            'nama_struktur' => 'required',
            'deskripsi_struktur' => 'required',
            'gambar_struktur' => 'nullable',
        ], [
            'nama_struktur.required' => 'Nama Struktur harus diisi!',
            'deskripsi_struktur.required' => 'Deskripsi Struktur harus diisi',
        ]);

        $strukturs->nama_struktur = $validatedData['nama_struktur'];
        $strukturs->deskripsi_struktur = $validatedData['deskripsi_struktur'];

        if ($request->hasFile('gambar_struktur')) {
            $file = $request->file('gambar_struktur');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('struktur', $fileName, 'public');
            $strukturs->gambar_struktur = $fileName;
        }
        // dd($strukturs);
        $strukturs->save();

        return redirect('/data-struktur')->with('message', 'Data Struktur berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Struktur::destroy($id);
        return redirect('/data-struktur')->with('message', 'Data Struktur berhasil dihapus!');
    }
}
