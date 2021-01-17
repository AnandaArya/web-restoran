<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Http\Request;
// use Auth;
use Hash;

class PenggunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggunas = Pengguna::paginate(4);
        return view('penggunas/index', compact('penggunas'));
    }

    public function print()
    {
        $penggunas = Pengguna::all();
        return view('penggunas/print', compact('penggunas'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $penggunas = Pengguna::where('name', 'LIKE', "%$search%")->paginate(5);
        return view('penggunas/index', compact('penggunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penggunas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambarFile = $request->gambar;
        $namaFile = uniqid().".".$gambarFile->getClientOriginalExtension();

        $pengguna = new Pengguna;
        // $pengguna->id = $request->id;
        $pengguna->name = $request->name;
        $pengguna->level = $request->level;
        $pengguna->email = $request->email;
        $pengguna->password = Hash::make($request->password);
        $pengguna->jenis_kelamin = $request->jenis_kelamin;
        $pengguna->alamat = $request->alamat;
        $pengguna->no_telp = $request->no_telp;

        $pengguna->gambar = $namaFile;
        $gambarFile->move(public_path().'/img', $namaFile);

        $pengguna->save();

        return redirect('penggunas');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        return view('penggunas/edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        // cara 1
        $dataAwal = Pengguna::findorfail($request->id);
        $namaAwalGambar = $dataAwal->gambar;
        
        if(!empty($request->gambar)) {
            $request->gambar->move(public_path().'/img', $namaAwalGambar);
        }

        Pengguna::where('id', $pengguna->id)
                ->update([
                    'name' => $request->name,
                    'level' => $request->level,
                    'email' => $request->email,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'no_telp' => $request->no_telp,
                    'gambar' => $namaAwalGambar,
                ]);
        return redirect('/penggunas');

        // cara ke 2
        // $pengguna = Pengguna::findorfail($request->id);
        // // $request->gambar->move(public_path().'/img', $namaAwalGambar);
        // $namaAwalGambar = $pengguna->gambar;
        // $pengguna->name = $request->name;
        // $pengguna->level = $request->level;
        // $pengguna->email = $request->email;
        // $pengguna->jenis_kelamin = $request->jenis_kelamin;
        // $pengguna->alamat = $request->alamat;
        // $pengguna->no_telp = $request->no_telp;

        // if(!empty($request->gambar)) {
        //     $request->gambar->move(public_path().'/img', $namaAwalGambar);
        //     $pengguna->gambar = $namaAwalGambar;
        // }

        // $pengguna->save();
        // return redirect('/penggunas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        // dd($pengguna->id); //cek apakah id nya masuk
        // pertama kita cari dulu datanya berdasarkan id pengguna
        $data = Pengguna::findorfail($pengguna->id);
        // lalu kia cari nama gambar yang sudah ada di variable $data -> didalam folder public/img
        $file = public_path('/img/').$data->gambar;

        // cek jika gambar ada
        if(file_exists($file)) {
            // maka hapus filenya yang ada di folder public/img
            @unlink($file);
        }

        // kita hapus data pengguna berdasarkan id
        pengguna::destroy($pengguna->id);

        return redirect('/penggunas');
    }
}
