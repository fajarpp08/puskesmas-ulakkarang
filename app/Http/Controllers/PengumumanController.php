<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::latest()->get();

        return view('admin.pengumuman.index', compact('pengumumans'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pengumuman' => 'required',
            'deskripsi_pengumuman' => 'required',
            'gambar_pengumuman' => 'nullable',
            'tanggal_pengumuman' => 'required',
            'lama_pengumuman' => 'required',
        ], [
            'nama_pengumuman.required' => 'Nama Pengumuman harus diisi!',
            'deskripsi_pengumuman.required' => 'Deskripsi Pengumuman harus diisi!',
            'tanggal_pengumuman.required' => 'Tanggal Pengumuman harus diisi!',
            'lama_pengumuman.required' => 'Lama Bacaan Pengumuman harus diisi!',
        ]);

        if ($validator->fails()) {
            return redirect('/data-pengumuman')->withErrors($validator)->withInput();
        }
        $pengumumans = $validator->valid();

        $pengumumans = new Pengumuman();
        $pengumumans->nama_pengumuman = $request->nama_pengumuman;
        $pengumumans->deskripsi_pengumuman = $request->deskripsi_pengumuman;
        $pengumumans->tanggal_pengumuman = $request->tanggal_pengumuman;
        $pengumumans->lama_pengumuman = $request->lama_pengumuman;

        if ($request->hasFile('gambar_pengumuman')) {
            $file = $request->file('gambar_pengumuman');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('pengumuman', $fileName, 'public');
            $pengumumans->gambar_pengumuman = $fileName;
        }
        // dd($pengumumans);

        $pengumumans->save();

        return redirect('/data-pengumuman')->with('message', 'Data Pengumuman berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $pengumumans = Pengumuman::findOrFail($id);

        $validatedData = $request->validate([
            'nama_pengumuman' => 'required',
            'deskripsi_pengumuman' => 'required',
            'gambar_pengumuman' => 'nullable',
            'tanggal_pengumuman' => 'required',
            'lama_pengumuman' => 'required',
        ], [
            'nama_pengumuman.required' => 'Nama pengumuman harus diisi!',
            'deskripsi_pengumuman.required' => 'Deskripsi pengumuman harus diisi!',
            'tanggal_pengumuman.required' => 'Tanggal pengumuman harus diisi!',
            'lama_pengumuman.required' => 'Lama Bacaan pengumuman harus diisi!',
        ]);

        $pengumumans->nama_pengumuman = $validatedData['nama_pengumuman'];
        $pengumumans->deskripsi_pengumuman = $validatedData['deskripsi_pengumuman'];
        $pengumumans->tanggal_pengumuman = $validatedData['tanggal_pengumuman'];
        $pengumumans->lama_pengumuman = $validatedData['lama_pengumuman'];

        if ($request->hasFile('gambar_pengumuman')) {
            $file = $request->file('gambar_pengumuman');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('pengumuman', $fileName, 'public');
            $pengumumans->gambar_pengumuman = $fileName;
        }
        // dd($pengumumans);
        $pengumumans->save();

        return redirect('/data-pengumuman')->with('message', 'Data Pengumuman berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Pengumuman::destroy($id);
        return redirect('/data-pengumuman')->with('message', 'Data Pengumuman berhasil dihapus!');
    }
}
