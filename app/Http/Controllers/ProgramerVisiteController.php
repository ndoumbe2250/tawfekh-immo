<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Propertie;
use Illuminate\Http\Request;
use App\Models\ProgramerVisite;
use Illuminate\Support\Facades\Auth;

class ProgramerVisiteController extends Controller
{   
    public function index()
    {
        $visites = ProgramerVisite::latest()->with(['property', 'agent'])->get();
        return view('programer_visites.index', compact('visites'));
    }

    public function create()
    {
        $properties = Propertie::all();
        $agents = User::all();
        return view('programer_visites.create', compact('properties', 'agents'));
    }

    public function store(Request $request)
    {
        $user=Auth::user();
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'visitor_name' => '|string|max:255',
            'visitor_email' => '|email',
            'visitor_phone' => '|string',
            'visit_date' => '|date',
            'message' => 'nullable|string',
            'status' => 'in:en_attente,confirmer,completer,rejetter',
            'agent_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string',
        ]);
        
        $validated['visitor_name'] = $user->name;
        $validated['visitor_email'] = $user->email;
        $validated['visitor_phone'] = $user->phone;
        $datetime = Carbon::parse($request->visit_date . ' ' . $request->visit_time);
        $validated['visit_date'] = $datetime->toDateTimeString();
        // dd($validated);
        ProgramerVisite::create($validated);
        return redirect()->route('programer_visites.index')->with('success', 'Visite programmée avec succès.');
    }

    public function show(ProgramerVisite $programer_visite)
    {
        return view('programer_visites.show', compact('programer_visite'));
    }

    public function edit(ProgramerVisite $programer_visite)
    {
        $properties = Propertie::all();
        $agents = User::all();
        return view('programer_visites.edit', compact('programer_visite', 'properties', 'agents'));
    }

    public function update(Request $request, ProgramerVisite $programer_visite)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'visitor_name' => 'required|string|max:255',
            'visitor_email' => 'required|email',
            'visitor_phone' => 'required|string',
            'visit_date' => 'required|date',
            'message' => 'nullable|string',
            'status' => 'in:en_attente,confirmer,completer,rejetter',
            'agent_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string',
        ]);

        $programer_visite->update($validated);
        return redirect()->route('programer_visites.index')->with('success', 'Visite mise à jour.');
    }

    public function destroy(ProgramerVisite $programer_visite)
    {
        $programer_visite->delete();
        return redirect()->route('programer_visites.index')->with('success', 'Visite supprimée.');
    }
}
