<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Silahkan Masukkkan Username',
            'password.required' => 'Silahkan Masukkan Password.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('username', $request->username)->first();

        if ($user) {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $user = Auth::user();

                if ($user->role == 'Admin') {
                    return redirect()->route('dashboardAdmin');
                } 
                // elseif ($user->role == 'User') {
                //     return redirect()->route('dashboardUser');
                // }
            } else {
                // Password salah
                $validator->errors()->add('password', 'Password salah!');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } else {
            $validator->errors()->add('username', 'Username ini tidak terdaftar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    // public function register()
    // {
    //     return view('register');
    // }

    // public function saveRegister(Request $request)
    // { {
    //         $validator = Validator::make($request->all(), [
    //             'nama' => 'required',
    //             'nik' => 'required|unique:users',
    //             'password' => 'required',

    //         ], [
    //             'nama.required' => 'Nama harus diisi!',
    //             'nik.required' => 'Nomor NIK harus diisi!',
    //             'nik.unique' => 'Nomor NIK ini sudah ada, silahkan ganti!',
    //             'password.required' => 'Password harus diisi!',
    //         ]);

    //         if ($validator->fails()) {
    //             return redirect('/register')->withErrors($validator)->withInput();
    //         }
    //         $register = $validator->valid();

    //         $register = new User();
    //         $register->nama = $request->nama;
    //         $register->nik = $request->nik;
    //         $register->password = Hash::make($request->password);

    //         $register->save();

    //         return redirect('/login')->with('message', 'Akun berhasil dibuat, silahkan login!');
    //     }
    // }
    
}
