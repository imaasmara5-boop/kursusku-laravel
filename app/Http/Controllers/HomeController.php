<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (home.blade.php)
     */
    public function index()
    {
        // Memanggil file resources/views/home.blade.php
        return view('home'); 
    }
}