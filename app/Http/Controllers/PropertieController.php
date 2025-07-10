<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Propertie;
use Illuminate\Support\Str;
use App\Models\TypeProperty;
use Illuminate\Http\Request;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class PropertieController extends Controller
{
   public function index()
    {
        $properties = Propertie::with('typeProperty', 'agent')->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $types = TypeProperty::all();
        $agents = User::where('role', 'agent')->get();
        return view('properties.create', compact('types', 'agents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'transaction_type' => 'required|in:vente,location',
            'prix' => 'required|numeric',
            'surface_habitable' => 'required|numeric',
            'nb_chambres' => 'required|integer|min:0',
            'nb_salles_bain' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'type_properties_id' => 'required|exists:type_properties,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:disponible,vendu,loue,reserve',
            'is_active' => 'boolean',
            'en_vedette' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['en_vedette'] = $request->has('en_vedette') ? 1 : 0;
        
        Propertie::create($validated);
        ToastMagic::success("Success!", "Propriété créée avec succès!", [
                'showCloseBtn' => true,  
            ]);
        return redirect()->route('properties.index')->with('success', 'Propriété créée avec succès.');
    }

    public function show(Propertie $property)
    {
        
        return view('properties.show', compact('property'));
    }

    public function edit(Propertie $property)
    {
        $types = TypeProperty::all();
        $agents = User::where('role', 'agent')->get();
        return view('properties.create', compact('property', 'types', 'agents'));
    }

    public function update(Request $request, Propertie $property)
    {
       
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'transaction_type' => 'required|in:vente,location',
            'prix' => 'required|numeric',
            'surface_habitable' => 'required|numeric',
            'nb_chambres' => 'required|integer|min:0',
            'nb_salles_bain' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'type_properties_id' => 'required|exists:type_properties,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:disponible,vendu,loue,reserve',
            'is_active' => 'boolean',
            'en_vedette' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['en_vedette'] = $request->has('en_vedette') ? true : false;
         
        $property->update($validated);
         ToastMagic::success("Success!", "Propriété mise à jour avec succès!", [
                'showCloseBtn' => true,  
            ]);
        return redirect()->route('properties.index')->with('success', 'Propriété mise à jour avec succès.');
    }

    public function destroy(Propertie $property)
    {
        $property->delete();
        ToastMagic::success("Success!", "Propriété supprimée avec succès!", [
                'showCloseBtn' => true,  
            ]);
        return redirect()->route('properties.index')->with('success', 'Propriété supprimée.');
    }

    public function ajaxSearch(Request $request)
{
    $query = Propertie::query()->where('is_active', true);

    if ($request->filled('propertyType')) {
        $query->where('type_properties_id', $request->propertyType);
    }

    if ($request->filled('transactionType')) {
        $query->where('transaction_type', $request->transactionType);
    }

    if ($request->filled('location')) {
        $query->where('address', 'like', '%' . $request->location . '%');
    }

    if ($request->filled('priceRange')) {
        $range = str_replace('+', '', $request->priceRange);
        $parts = explode('-', $range);
        if (count($parts) == 2) {
            $query->whereBetween('prix', [$parts[0], $parts[1]]);
        } elseif (str_contains($request->priceRange, '+')) {
            $query->where('prix', '>=', $parts[0]);
        }
    }

    if ($request->filled('rooms')) {
        $val = $request->rooms;
        $query->where('nb_etages', $val === '5+' ? '>=' : '=', (int) filter_var($val, FILTER_SANITIZE_NUMBER_INT));
    }

    if ($request->filled('bedrooms')) {
        $val = $request->bedrooms;
        $query->where('nb_chambres', $val === '4+' ? '>=' : '=', (int) filter_var($val, FILTER_SANITIZE_NUMBER_INT));
    }

    if ($request->filled('minSurface')) {
        $query->where('surface_habitable', '>=', $request->minSurface);
    }

    if ($request->filled('maxSurface')) {
        $query->where('surface_habitable', '<=', $request->maxSurface);
    }
     $typePropriété=TypeProperty::all();
    $propriétés = $query->get();

    // return view('properties.partials.search-results', compact('properties'))->render();
    return view('accueil.properties', compact('propriétés','typePropriété'))->render();

 }

}
