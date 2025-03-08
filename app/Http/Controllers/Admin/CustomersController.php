<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::all();

        //dd($customers);
        return view('admin.customers.index', compact('customers'));

    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        Customers::create([
            'CustomerID' => $request->input('CustomerID'),
            'CustomerName' => $request->input('CustomerName'),
            'Phone' => $request->input('Phone'),
            'Address' => $request->input('Address'),
        ]);
        return redirect()->route('admin.customers.index');
    }

    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
        return redirect()->route('admin.customers.index');
    }
}