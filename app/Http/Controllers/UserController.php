<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
   public function index()
   {
           $users = User::latest()->get(); // 10 items per page

           return view('admin.user.index', compact('users'));
   }
//    public function create()
//     {
//         return view('admin.user.create');
//     }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            // 'role' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi!',
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username ini sudah digunakan, silahkan ganti dengan username yang lain!',
            // 'role.required' => 'Role harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);


        if ($validator->fails()) {
            return redirect('/data-user')->withErrors($validator)->withInput();
        }
        $user = $validator->valid();

        $user = new User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        // $user->role = $request->role;

        $user->save();

        return redirect('/data-user')->with('success', 'Data berhasil ditambahkan');
    }

    // public function edit(string $id)
    // {
    //     $users = User::find($id);
    //     return view('admin.user.edit', compact('users'));
    // }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'nullable',
            'role' => 'required',
        ], [
            'nama.required' => 'kolom nama harus diisi',
            'username.required' => 'kolom username harus diisi',
            'password.required' => 'kolom password  harus diisi',
            'role.required' => 'kolom role harus diisi',

        ]);

        $user->nama = $validatedData['nama'];
        $user->username = $validatedData['username'];
        $user->password = Hash::make($request->password);
        $user->role = $validatedData['role'];

        $user->save();

        return redirect('/data-user')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/data-user')->with('success', 'Data berhasil dihapus!');
    }
}
