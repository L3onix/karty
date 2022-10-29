<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return View::make('customers.index')->with('customers', $customer);
    }

    public function show($id)
    {
        return view('customers.profile', [
            'customer' => Customer::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        Customer::create($request->all());
    
        return redirect('customers')->with('flash_message', 'Customer created!');
    }
}
