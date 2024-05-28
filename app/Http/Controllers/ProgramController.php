<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();

        return view('admin.program.index', compact('programs'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_program' => 'required',
            'deskripsi_program' => 'required',
            'gambar_program' => 'nullable',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'lokasi_program' => 'required',
        ], [
            'nama_program.required' => 'Nama program harus diisi!',
            'deskripsi_program.required' => 'Deskripsi program harus diisi',
            'tanggal_program.required' => 'Tanggal program harus diisi',
            'tanggal_mulai.required' => 'Tanggal mulai program harus diisi',
            'tanggal_akhir.required' => 'Tanggal akhir program harus diisi',
            'lokasi_program.required' => 'Lokasi program harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-program')->withErrors($validator)->withInput();
        }
        $programs = $validator->valid();
 
        $programs = new Program();
        $programs->nama_program = $request->nama_program;
        $programs->deskripsi_program = $request->deskripsi_program;
        $programs->tanggal_mulai = $request->tanggal_mulai;
        $programs->tanggal_akhir = $request->tanggal_akhir;
        $programs->lokasi_program = $request->lokasi_program;

        if ($request->hasFile('gambar_program')) {
            $file = $request->file('gambar_program');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('program', $fileName, 'public');
            $programs->gambar_program = $fileName;
        }
        // dd($programs);

        $programs->save();

        return redirect('/data-program')->with('message', 'Data Program berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $programs = Program::findOrFail($id);

        $validatedData = $request->validate([
            'nama_program' => 'required',
            'deskripsi_program' => 'required',
            'gambar_program' => 'nullable',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'lokasi_program' => 'required',
        ], [
            'nama_program.required' => 'Nama program harus diisi!',
            'deskripsi_program.required' => 'Deskripsi program harus diisi!',
            'tanggal_mulai.required' => 'Tanggal mulai program harus diisi!',
            'tanggal_akhir.required' => 'Tanggal akhir program harus diisi!',
            'lokasi_program.required' => 'Lokasi program harus diisi!',
        ]);

        $programs->nama_program = $validatedData['nama_program'];
        $programs->deskripsi_program = $validatedData['deskripsi_program'];
        $programs->tanggal_mulai = $validatedData['tanggal_mulai'];
        $programs->tanggal_akhir = $validatedData['tanggal_akhir'];
        $programs->lokasi_program = $validatedData['lokasi_program'];

        if ($request->hasFile('gambar_program')) {
            $file = $request->file('gambar_program');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('program', $fileName, 'public');
            $programs->gambar_program = $fileName;
        }
        // dd($programs);
        $programs->save();

        return redirect('/data-program')->with('message', 'Data Program berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Program::destroy($id);
        return redirect('/data-program')->with('message', 'Data Program berhasil dihapus!');
    }
}
