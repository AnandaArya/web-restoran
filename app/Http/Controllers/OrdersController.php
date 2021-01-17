<?php

namespace App\Http\Controllers;

use App\Order;
use App\Masakan;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Masakan::paginate(4);
        return view('orders/index', compact('orders'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $orders = Masakan::where('kategori', 'LIKE', "%$search%")->paginate(5);
        return view('orders/index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    // public function new(Order $order)
    // {
    //     // $dataAwal = order::all();

    //     // dd($dataAwal);
    //     // return view('orders/create', ['orders' => $dataAwal]);
    // }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requests
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $order = new Order;
        $order->meja_id = $request->meja_id;
        $order->masakan_id = $request->masakan_id;
        $order->jumlah = $request->jumlah;
        $order->total_harga = $request->total_harga;
        $order->status = $request->status;
        $order->tanggal = $request->tanggal;

        $order->save();

        return redirect('orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function new($id)
    {
        //
        // dd($id);
        $dataAwal = Masakan::findorfail($id);
        return view('orders/create', ['order' => $dataAwal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
