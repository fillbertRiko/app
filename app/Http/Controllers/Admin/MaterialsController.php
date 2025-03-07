<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materials;



class MaterialsController extends Controller
{
    public function index()
    {
        $materials = Materials::all();
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        return view('admin.materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Materials::create($request->all());

        return redirect()->route('admin.materials.index')->with('success', 'Material created successfully.');
    }

    public function edit(Materials $material)
    {
        return view('admin.materials.edit', compact('material'));
    }

    public function update(Request $request, Materials $material)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $material->update($request->all());

        return redirect()->route('admin.materials.index')->with('success', 'Material updated successfully.');
    }

    public function destroy(Materials $material)
    {
        $material->delete();

        return redirect()->route('admin.materials.index')->with('success', 'Material deleted successfully.');
    }
}