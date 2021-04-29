<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }
    
    public function products()
    {
        $products = Product::all('id', 'title', 'description', 'price', 'image');

        return view('frontend.pages.products', compact('products'));
    }
}
