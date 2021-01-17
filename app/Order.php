<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['meja_id', 'masakan_id', 'jumlah', 'total_harga', 'status', 'tanggal'];


}
