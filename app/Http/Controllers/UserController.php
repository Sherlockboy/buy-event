<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function buy($id)
    {
        $data = [
            'user_id' => auth()->id(),
            'product_id' => (int)$id
        ];
        // dd($data);
        try {
            Order::create($data);
        } catch (Exception $e) {
            Log::alert($e->getMessage());

            return back()->withErrors('message', 'Something went wrong while making order!');
        }

        return back()->with('success', 'Order successfully made!');
    }

    public function dashboard($slug)
    {
        return view('frontend.pages.dashboard')->with([
            'orders' => Order::with('product')->latest()->get(),
            'user' => auth()->user()
        ]);
    }
}
