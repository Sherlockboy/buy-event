<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('frontend.pages.admin.dashboard')->with([
            'orders' => Order::with('product', 'user')->latest()->get(),
            'user' => auth()->user()
        ]);
    }

    public function users()
    {
        return view('frontend.pages.admin.users')->with([
            'users' => User::all()
        ]);
    }

    public function sms($id)
    {
        dd($id);
    }

    public function mail($id)
    {
        dd($id);
    }
}
