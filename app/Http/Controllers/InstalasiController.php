<?php

namespace App\Http\Controllers;

use App\Models\Instalasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstalasiController extends Controller
{
    public function index()
    {
        $instalasis = Instalasi::latest()->get();

        return view('admin.instalasi.index', compact('instalasis'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_instalasi' => 'required',
        ], [
            'jenis_instalasi.required' => 'Jenis instalasi harus diisi!',
        ]);

        if ($validator->fails()) {
            return redirect('/data-instalasi')->withErrors($validator)->withInput();
        }
        $instalasis = $validator->valid();

        $instalasis = new Instalasi();
        $instalasis->jenis_instalasi = $request->jenis_instalasi;

        $instalasis->save();

        return redirect('/data-instalasi')->with('message', 'Data instalasi berhasil ditambahkan!');
    }



    public function update(Request $request, string $id)
    {
        $instalasis = Instalasi::findOrFail($id);

        $validatedData = $request->validate([
            'jenis_instalasi' => 'required',
        ], [
            'jenis_instalasi.required' => 'Jenis instalasi harus diisi!',
        ]);

        $instalasis->jenis_instalasi = $validatedData['jenis_instalasi'];

        $instalasis->save();

        return redirect('/data-instalasi')->with('message', 'Data instalasi berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Instalasi::destroy($id);
        return redirect('/data-instalasi')->with('message', 'Data instalasi berhasil dihapus!');
    }
}
