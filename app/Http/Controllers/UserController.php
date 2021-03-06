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

            return back()->with('error', 'Something went wrong while making order!');
        }

        return back()->with('success', 'Order successfully made!');
    }

    public function dashboard()
    {
        return view('frontend.pages.user.dashboard')->with([
            'orders' => auth()->user()->orders->sortByDesc('created_at'),
            'user' => auth()->user()
        ]);
    }
}
