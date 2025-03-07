<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Suppliers::create($request->all());

        return redirect()->route('admin.suppliers.index')
                         ->with('success', 'Supplier created successfully.');
    }

    public function show($id)
    {
        $supplier = Suppliers::find($id);
        return view('admin.suppliers.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Suppliers::find($id);
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $supplier = Suppliers::find($id);
        $supplier->update($request->all());

        return redirect()->route('admin.suppliers.index')
                         ->with('success', 'Supplier updated successfully.');
    }

    public function destroy($id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();

        return redirect()->route('admin.suppliers.index')
                         ->with('success', 'Supplier deleted successfully.');
    }
}
