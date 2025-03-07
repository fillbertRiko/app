<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;



class ReportsController extends Controller
{
    // Display a listing of the reports
    public function index()
    {
        // Code to fetch and display reports
        return view('admin.reports.index');
    }

    // Show the form for creating a new report
    public function create()
    {
        return view('admin.reports.create');
    }

    // Store a newly created report in storage
    public function store(Request $request)
    {
        // Code to validate and save the new report
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Save the report
        // Report::create($validatedData);

        return redirect()->route('admin.reports.index')->with('success', 'Report created successfully.');
    }

    // Display the specified report
    public function show($id)
    {
        // Code to fetch and display a specific report
        // $report = Report::findOrFail($id);
        return view('admin.reports.show', compact('report'));
    }

    // Show the form for editing the specified report
    public function edit($id)
    {
        // Code to fetch the report to be edited
        // $report = Report::findOrFail($id);
        return view('admin.reports.edit', compact('report'));
    }

    // Update the specified report in storage
    public function update(Request $request, $id)
    {
        // Code to validate and update the report
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Update the report
        // $report = Report::findOrFail($id);
        // $report->update($validatedData);

        return redirect()->route('admin.reports.index')->with('success', 'Report updated successfully.');
    }

    // Remove the specified report from storage
    public function destroy($id)
    {
        // Code to delete the report
        // $report = Report::findOrFail($id);
        // $report->delete();

        return redirect()->route('admin.reports.index')->with('success', 'Report deleted successfully.');
    }
}