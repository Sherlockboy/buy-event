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
            return back()->with('error', 'Could not send SMS, please try again!');
        }

        $this->accept($order);
        
        return back()->with('success', 'Accepted, SMS send successfully!');
    }

    public function mail($id)
    {
        dd($id);
    }

    protected function accept(Order $order)
    {
        $order->status = 0;
        $order->save();
    }
}
