<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::latest()->get();

        return view('admin.poli.index', compact('polis'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_poli' => 'required',
            'deskripsi_poli' => 'required',
            'gambar_poli' => 'nullable',
        ], [
            'nama_poli.required' => 'Nama Poli harus diisi!',
            'deskripsi_poli.required' => 'Deskripsi Poli harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-poli')->withErrors($validator)->withInput();
        }
        $polis = $validator->valid();

        $polis = new Poli();
        $polis->nama_poli = $request->nama_poli;
        $polis->deskripsi_poli = $request->deskripsi_poli;

        if ($request->hasFile('gambar_poli')) {
            $file = $request->file('gambar_poli');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('poli', $fileName, 'public');
            $polis->gambar_poli = $fileName;
        }
        // dd($polis);

        $polis->save();

        return redirect('/data-poli')->with('message', 'Data Poli berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $polis = Poli::findOrFail($id);

        $validatedData = $request->validate([
            'nama_poli' => 'required',
            'deskripsi_poli' => 'required',
            'gambar_poli' => 'nullable',
        ], [
            'nama_poli.required' => 'Nama Poli harus diisi!',
            'deskripsi_poli.required' => 'Deskripsi Poli harus diisi',
        ]);

        $polis->nama_poli = $validatedData['nama_poli'];
        $polis->deskripsi_poli = $validatedData['deskripsi_poli'];

        if ($request->hasFile('gambar_poli')) {
            $file = $request->file('gambar_poli');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('poli', $fileName, 'public');
            $polis->gambar_poli = $fileName;
        }
        // dd($polis);
        $polis->save();

        return redirect('/data-poli')->with('message', 'Data Poli berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Poli::destroy($id);
        return redirect('/data-poli')->with('message', 'Data Poli berhasil dihapus!');
    }
}
