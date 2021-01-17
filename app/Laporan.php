<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $table = 'transactions';
    protected $fillable = ['meja_id', 'nama_masakan', 'total_harga', 'status', 'tanggal'];
}
