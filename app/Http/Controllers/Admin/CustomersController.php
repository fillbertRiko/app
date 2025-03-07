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
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function edit($id)
    {
        $customer = Customers::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }
}