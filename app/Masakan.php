<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    //
    protected $table =  'masakans';
    protected $fillable = ['id', 'nama', 'harga', 'status', 'gambar'];
}
