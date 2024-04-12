<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Plan;
use App\Models\Order;

class OrderController extends Controller
{

    // All Plans
    public function index()
    {
        $plans = Plan::all();
        return view('checkout', compact('plans'));
    }


    // Show All Transaction
    public function show()
    {
        $orders = Order::all();
        return view('transaction', compact('orders'));
    }


    // Checkout and Payment Integration
    public function submit(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'user_id' => 'required|exists:users,id',
          
            'address' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'code' => 'required|string',
        ]);

        $order = Order::create($request->all());
        $plan = Plan::findOrFail($request->plan_id);
        Stripe::setApiKey(env('SECRET_KEY'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $plan->name,
                    ],
                    'unit_amount' => $plan->price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect($session->url);
    }



    // Get Profile
    public function profile()
    {
        $orders = Order::all();
        $user = Auth::user();
        return view('profile', ['orders' => $orders, 'user' => $user]);
    }
}
