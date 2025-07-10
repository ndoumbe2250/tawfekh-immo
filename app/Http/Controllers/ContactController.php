<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Propertie;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index()
    {
        $contacts = Contact::with(['property', 'assignedTo'])->latest()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $properties = Propertie::all();
        $users = User::all();
        return view('contacts.create', compact('properties', 'users'));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'type_demande' => 'required|in:vente,achat,location,estimation,autre',
            'message' => 'required|string',
            'status' => 'in:en_attente,traitee,cloturee',
            
        ]);
       

        Contact::create($validated);

        return redirect()->back()->with('success', 'message envoyé.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $properties = Propertie::all();
        $users = User::all();
        return view('contacts.edit', compact('contact', 'properties', 'users'));
    }

    public function update(Request $request, Contact $contact)
    {
        // $validated = $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|email',
        //     'phone' => 'nullable|string',
        //     'type_demande' => 'required|in:vente,achat,location,estimation,autre',
        //     'message' => 'required|string',
        //     'properties_id' => 'nullable|exists:properties,id',
        //     'status' => 'in:en_attente,traitee,cloturee',
        //     'traitee_le' => 'nullable|date',
        //     'assigned_to' => 'nullable|exists:users,id',
        // ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact mis à jour.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact supprimé.');
    }
}
