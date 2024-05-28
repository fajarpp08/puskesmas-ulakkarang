<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitasis = Fasilitas::latest()->get();

        return view('admin.fasilitas.index', compact('fasilitasis'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_fasilitas' => 'required',
            'deskripsi_fasilitas' => 'required',
            'gambar_fasilitas' => 'nullable',
        ], [
            'nama_fasilitas.required' => 'Nama Fasilitas harus diisi!',
            'deskripsi_fasilitas.required' => 'Deskripsi Fasilitas harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-fasilitas')->withErrors($validator)->withInput();
        }
        $fasilitasis = $validator->valid();

        $fasilitasis = new Fasilitas();
        $fasilitasis->nama_fasilitas = $request->nama_fasilitas;
        $fasilitasis->deskripsi_fasilitas = $request->deskripsi_fasilitas;

        if ($request->hasFile('gambar_fasilitas')) {
            $file = $request->file('gambar_fasilitas');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('fasilitas', $fileName, 'public');
            $fasilitasis->gambar_fasilitas = $fileName;
        }
        // dd($fasilitasis);

        $fasilitasis->save();

        return redirect('/data-fasilitas')->with('message', 'Data Poli berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $fasilitasis = Fasilitas::findOrFail($id);

        $validatedData = $request->validate([
            'nama_fasilitas' => 'required',
            'deskripsi_fasilitas' => 'required',
            'gambar_fasilitas' => 'nullable',
        ], [
            'nama_fasilitas.required' => 'Nama Fasilitas harus diisi!',
            'deskripsi_fasilitas.required' => 'Deskripsi Fasilitas harus diisi',
        ]);

        $fasilitasis->nama_fasilitas = $validatedData['nama_fasilitas'];
        $fasilitasis->deskripsi_fasilitas = $validatedData['deskripsi_fasilitas'];

        if ($request->hasFile('gambar_fasilitas')) {
            $file = $request->file('gambar_fasilitas');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('fasilitas', $fileName, 'public');
            $fasilitasis->gambar_fasilitas = $fileName;
        }
        // dd($fasilitasis);
        $fasilitasis->save();

        return redirect('/data-fasilitas')->with('message', 'Data Fasilitas berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Fasilitas::destroy($id);
        return redirect('/data-fasilitas')->with('message', 'Data Fasilitas berhasil dihapus!');
    }
}
