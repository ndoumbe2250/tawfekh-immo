<?php

namespace App\Http\Controllers;

use App\Models\Cite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CiteController extends Controller
{
     public function index()
    {
        $cites = Cite::all();
        return view('cites.index', compact('cites'));
    }

    public function create()
    {
        return view('cites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        Cite::create($validated);

        return redirect()->route('cites.index')->with('success', 'Cité créée avec succès.');
    }

    public function show(Cite $cite)
    {
        return view('cites.show', compact('cite'));
    }

    public function edit(Cite $cite)
    {
        return view('cites.edit', compact('cite'));
    }

    public function update(Request $request, Cite $cite)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $cite->update($validated);

        return redirect()->route('cites.index')->with('success', 'Cité mise à jour.');
    }

    public function destroy(Cite $cite)
    {
        $cite->delete();
        return redirect()->route('cites.index')->with('success', 'Cité supprimée.');
    }
}
