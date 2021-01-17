<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BerandaController extends Controller
{
    //
    public function index() 
    {
        return view('profile/index');
    }

    public function halamanSatu()
    {
        return view('halaman/halaman-satu');
    }

    public function halamanDua()
    {
        return view('halaman/halaman-dua');
    }
}
