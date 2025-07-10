<?php

namespace App\Http\Controllers;

use App\Models\TypeProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypePropertyController extends Controller
{
     public function index()
    {
        $typeProperties = TypeProperty::all();
        return view('type_properties.index', compact('typeProperties'));
    }

    public function create()
    {
        return view('type_properties.create');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active') ? true : false;

        TypeProperty::create($validated);

        return redirect()->route('type_properties.index')->with('success', 'Type ajouté');
    }

    public function show(TypeProperty $typeProperty)
    {
        return view('type_properties.show', compact('typeProperty'));
    }

    public function edit(TypeProperty $typeProperty)
    {
        return view('type_properties.edit', compact('typeProperty'));
    }

    public function update(Request $request, TypeProperty $typeProperty)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active') ? true : false;

        $typeProperty->update($validated);

        return redirect()->route('type_properties.index')->with('success', 'Type mis à jour');
    }

    public function destroy(TypeProperty $typeProperty)
    {
        $typeProperty->delete();
        return redirect()->route('type_properties.index')->with('success', 'Type supprimé');
    }
}
