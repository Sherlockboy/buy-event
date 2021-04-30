<?php

namespace App\Http\Controllers;

use App\Mail\OrderAccepted;
use App\Models\Order;
use App\Models\User;
use App\Services\SmsService;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        
        try {
            $response = $service->send($message, $order->user->phone);
        } catch (Exception $e) {
            Log::alert($e->getMessage());

            return back()->with('error', 'Could not send SMS, please try again!');
        }

        $this->accept($order);
        
        return back()->with('success', 'Accepted, SMS send successfully!');
    }

    public function mail($id)
    {
        $order = Order::whereId($id)->with('user', 'product')->firstOrFail();
        
        $message = 'Your purchase to ' . $order->product->title . ' is accepted.';
        
        try {
            Mail::to($order->user->email)
                ->send(new OrderAccepted($message));
        } catch (Exception $e) {
            Log::alert($e->getMessage());

            return back()->with('error', 'Could not send Email, please try again!');
        }

        $this->accept($order);
        
        return back()->with('success', 'Accepted, Email send successfully!');
        
    }

    protected function accept(Order $order)
    {
        $order->status = 0;
        $order->save();
    }
}
