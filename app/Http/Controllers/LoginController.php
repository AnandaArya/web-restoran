<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function postLogin(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/beranda');
        }
        return redirect('login');
    }

    public function daftar()
    {
        return view('layout/register');
    }

    public function store(Request $request)
    {
        $gambarFile = $request->gambar;
        $namaFile = uniqid().".".$gambarFile->getClientOriginalExtension();

        $pengguna = new Pengguna;
        // $pengguna->id = $request->id;
        $pengguna->name = $request->name;
        $pengguna->level = 'user';
        $pengguna->email = $request->email;
        $pengguna->password = Hash::make($request->password);
        $pengguna->jenis_kelamin = $request->jenis_kelamin;
        $pengguna->alamat = $request->alamat;
        $pengguna->no_telp = $request->no_telp;

        $pengguna->gambar = $namaFile;
        $gambarFile->move(public_path().'/img', $namaFile);

        $pengguna->save();

        return redirect('login');
    }
    
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
