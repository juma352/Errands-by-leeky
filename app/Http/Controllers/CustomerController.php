<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class CustomerController extends  Controller


{
    use AuthorizesRequests;
    public function __construct()
    {
        $this->authorizeResource(Customer::class);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'customer_name' => 'required|min:3|unique:customers,customer_name',
                'email' => 'required|email|unique:customers,email'
            ]);
        
            auth()->user()->customer()->create([
                'customer_name' => $validatedData['customer_name'],
                'email' => $validatedData['email']
            ]);
        

        return redirect()->route('errands.index')
            ->with('success', 'Your customer account was created!');
    }
}