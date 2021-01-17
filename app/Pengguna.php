<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    //
    protected $table = 'users';
    protected $fillable = ['name', 'level', 'email', 'password', 'jenis_kelamin', 'alamat', 'gambar', 'no_telp'];
}
