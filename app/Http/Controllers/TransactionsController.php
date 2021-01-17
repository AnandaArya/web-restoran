<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Model;
use Illuminate\Http\Request;
use App\Order;
use DB;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::where('orders.status', 'selesai')
        //             ->select('orders.meja_id', 'orders.status', 'orders.tanggal', DB::raw('SUM(orders.total_harga) as total_harga'),
        //                 DB::raw('group_concat(masakans.nama) as nama_makanan'), DB::raw('group_concat(orders.jumlah) as jumlah'))
        //             ->join('masakans', 'masakans.id', '=', 'orders.masakan_id')
        //             ->groupby('orders.meja_id', 'orders.status', 'orders.tanggal');

        // $orders = DB::table('orders')->where('orders.status', 'proses')
        //                 ->select('orders.meja_id', 'orders.status', 'orders.tanggal', DB::raw('SUM(orders.total_harga) as total_harga'),
        //                     DB::raw('group_concat(masakans.nama) as nama_masakan'), DB::raw('group_concat(orders.jumlah) as jumlah'))
        //                 ->join('masakans', 'masakans.id', 'oders.status', '=', 'orders.masakan_id')
        //                 ->groupby('orders.meja_id', 'order.status', 'orders.tanggal');

        $orders = Order::where('orders.status', 'proses')
                        ->join('masakans', 'orders.masakan_id', '=', 'masakans.id')
                        ->select('orders.meja_id', 'orders.status', 'orders.tanggal', DB::raw('SUM(orders.total_harga) as total_harga'),
                            DB::raw('group_concat(masakans.nama) as nama_masakan'), DB::raw('group_concat(orders.jumlah) as jumlah'))
                        ->groupby('orders.meja_id', 'orders.status', 'orders.tanggal')->paginate(4);

        return view('transactions/index', compact('orders'));
    }

    public function print()
    {
        $orders = Order::where('orders.status', 'proses')
                        ->join('masakans', 'orders.masakan_id', '=', 'masakans.id')
                        ->select('orders.meja_id', 'orders.status', 'orders.tanggal', DB::raw('SUM(orders.total_harga) as total_harga'),
                            DB::raw('group_concat(masakans.nama) as nama_masakan'), DB::raw('group_concat(orders.jumlah) as jumlah'))
                        ->groupby('orders.meja_id', 'orders.status', 'orders.tanggal')->get();
        
        return view('transactions/print', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        
        $transactions = $request;
        // dd($transactions);
        return  view('transactions/create', compact('transactions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Order::where('meja_id', $request->meja_id)
                ->update([
                    'status' => 'selesai'
                ]);
        
        $transaction = new Transaction;
        $transaction->meja_id = $request->meja_id;
        $transaction->nama_masakan = $request->nama_masakan;
        $transaction->total_harga = $request->total_harga;
        $transaction->status = $request->status;
        $transaction->tanggal = $request->tanggal;

        $transaction->save();
        
        return redirect('laporans');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
