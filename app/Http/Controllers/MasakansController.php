<?php

namespace App\Http\Controllers;

use App\Masakan;
use Illuminate\Http\Request;

class MasakansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masakans = Masakan::paginate(5);
        return view('masakans/index', compact('masakans'));
    }

    public function print()
    {
        $masakans = Masakan::all();
        return view('masakans/print', compact('masakans'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $masakans = Masakan::where('nama', 'LIKE', "%$search%")->paginate(5);
        return view('masakans/index', compact('masakans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masakans/create');
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
        // $namaFile = time().rand(100,999).".".$gambarFile->getClientOriginalExtension();
        $namaFile = uniqid().".".$gambarFile->getClientOriginalExtension();

        $masakan = new Masakan;
        $masakan->id = $request->id;
        $masakan->nama = $request->nama;
        $masakan->kategori = $request->kategori;
        $masakan->harga = $request->harga;
        $masakan->status = $request->status;
        $masakan->gambar = $namaFile;

        // kita pindahkan file gambar ke folder public/img dengan diganti namanya $namaFile
        $gambarFile->move(public_path().'/img', $namaFile);
        $masakan->save();

        return redirect('masakans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function show(Masakan $masakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Masakan $masakan)
    {
        //
        return view('masakans/edit', compact('masakan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masakan $masakan)
    {
        $dataAwal = Masakan::findorfail($request->id);
        $namaAwalGambar = $dataAwal->gambar;

        if(!empty($request->gambar)) {
            $request->gambar->move(public_path().'/img', $namaAwalGambar);
        }
        Masakan::where('id', $masakan->id)
                ->update([
                    'nama' => $request->nama,
                    'harga' => $request->harga,
                    'kategori' => $request->kategori,
                    'status' => $request->status,
                    'gambar' => $namaAwalGambar,
                ]);
        return redirect('/masakans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masakan  $masakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masakan $masakan)
    {
        // dd($masakan->id); //cek apakah id nya masuk
        // pertama kita cari dulu datanya berdasarkan id masakan
        $data = Masakan::findorfail($masakan->id);
        // lalu kia cari nama gambar yang sudah ada di variable $data -> didalam folder public/img
        $file = public_path('/img/').$data->gambar;

        // cek jika gambar ada
        if(file_exists($file)) {
            // maka hapus filenya yang ada di folder public/img
            @unlink($file);
        }

        // kita hapus data masakan berdasarkan id
        Masakan::destroy($masakan->id);

        return redirect('/masakans');
    }
}
