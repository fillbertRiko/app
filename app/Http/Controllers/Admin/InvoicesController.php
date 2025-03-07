<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\invoices;



class InvoicesController extends Controller
{
    /**
     * Display a listing of the invoices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoices::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invoices.create');
    }

    /**
     * Store a newly created invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        invoices::create($request->all());

        return redirect()->route('admin.invoices.index')
                         ->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified invoice.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(invoices $invoice)
    {
        return view('admin.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified invoice.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(invoices $invoice)
    {
        return view('admin.invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified invoice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices $invoice)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        $invoice->update($request->all());

        return redirect()->route('admin.invoices.index')
                         ->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified invoice from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoices $invoice)
    {
        $invoice->delete();

        return redirect()->route('admin.invoices.index')
                         ->with('success', 'Invoice deleted successfully.');
    }
}