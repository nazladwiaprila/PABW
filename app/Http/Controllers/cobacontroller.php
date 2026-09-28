<?php

namespace App\Http\Controllers;

class cobacontroller extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function final()
    {
        return view('home');
    }

    public function hello()
    {
        return 'Hello, nama';
    }
}
