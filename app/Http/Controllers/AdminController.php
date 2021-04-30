<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\SmsService;
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

    public function sms(SmsService $service, $id)
    {
        $order = Order::whereId($id)->with('user', 'product')->firstOrFail();
        
        $message = 'Your purchase to ' . $order->product->title . ' is accepted.';
        
        $response = $service->send($message, $order->user->phone);
        
        if($response !== 200){
            return back()->withErrors('message', 'Could not send SMS, please try again!');
        }

        return back()->with('success', 'Accepted, SMS send successfully!');
    }

    public function mail($id)
    {
        dd($id);
    }
}
