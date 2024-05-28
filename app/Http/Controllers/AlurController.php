<?php

namespace App\Http\Controllers;

use App\Models\Alur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlurController extends Controller
{
    public function index()
    {
        $alurs = Alur::latest()->get();

        return view('admin.alur.index', compact('alurs'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_alur' => 'required',
            'deskripsi_alur' => 'required',
            'gambar_alur' => 'nullable',
        ], [
            'nama_alur.required' => 'Nama Alur harus diisi!',
            'deskripsi_alur.required' => 'Deskripsi Alur harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-alur')->withErrors($validator)->withInput();
        }
        $alurs = $validator->valid();

        $alurs = new Alur();
        $alurs->nama_alur = $request->nama_alur;
        $alurs->deskripsi_alur = $request->deskripsi_alur;

        if ($request->hasFile('gambar_alur')) {
            $file = $request->file('gambar_alur');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('alur', $fileName, 'public');
            $alurs->gambar_alur = $fileName;
        }
        // dd($alurs);

        $alurs->save();

        return redirect('/data-alur')->with('message', 'Data Alur berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $alurs = Alur::findOrFail($id);

        $validatedData = $request->validate([
            'nama_alur' => 'required',
            'deskripsi_alur' => 'required',
            'gambar_alur' => 'nullable',
        ], [
            'nama_alur.required' => 'Nama Alur harus diisi!',
            'deskripsi_alur.required' => 'Deskripsi Alur harus diisi',
        ]);

        $alurs->nama_alur = $validatedData['nama_alur'];
        $alurs->deskripsi_alur = $validatedData['deskripsi_alur'];

        if ($request->hasFile('gambar_alur')) {
            $file = $request->file('gambar_alur');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('alur', $fileName, 'public');
            $alurs->gambar_alur = $fileName;
        }
        // dd($alurs);
        $alurs->save();

        return redirect('/data-alur')->with('message', 'Data Alur berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Alur::destroy($id);
        return redirect('/data-alur')->with('message', 'Data Alur berhasil dihapus!');
    }
}