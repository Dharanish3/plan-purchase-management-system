<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use App\Models\User;

class PlanController extends Controller
{
    // Create a new plan
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
           
        ]);

        $plan = Plan::create($validatedData);

        return response()->json(['message' => 'Plan created successfully', 'plan' => $plan], 201);
    }

    // View all plans
    public function index()
    {
        $plans = Plan::all();
    
        return view('dashboard', ['plans' => $plans]);
    }


    // Get Plan By Id
    public function show($id)
    {   
        $plans=Plan::where('id' ,$id)->first();
        $user = Auth::user();
        return view('checkout', ['plans' => $plans, 'user' => $user]);
    }
    
}
