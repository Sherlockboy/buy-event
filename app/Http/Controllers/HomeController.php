<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }
    
    public function products()
    {
        return view('frontend.pages.products');
    }
}
