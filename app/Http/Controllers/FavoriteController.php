<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{   
     /**
     * Ajouter une propriété aux favoris.
     */
    public function store(Request $request, $id)
    {
        $user = Auth::user();

        $exists = Favorite::where('user_id', $user->id)
                          ->where('propertie_id', $id)
                          ->exists();

        if ($exists) {
            $exists ->delete(); // Remove the favorite if it already exists
            return response()->json(['success' => true, 'message' => 'Propriété retirée des favoris.']);
        }
        
        Favorite::create([
            'user_id' => $user->id,
            'propertie_id' => $id,
        ]);
         return response()->json(['success' => true]);
        // return redirect()->back()->with('success', 'Propriété ajoutée aux favoris.');
    }

    public function toggle(Request $request)
{
    $request->validate([
        'propertie_id' => 'required|exists:properties,id'
    ]);

    $favorite = Favorite::where('user_id', Auth::id())
                        ->where('propertie_id', $request->propertie_id)
                        ->first();

    if ($favorite) {
        $favorite->delete();
        return response()->json(['status' => 'removed']);
    } else {
        Favorite::create([
            'user_id' => Auth::id(),
            'propertie_id' => $request->propertie_id
        ]);
        return response()->json(['status' => 'added']);
    }
}
    /**
     * Supprimer un favori.
     */
    public function destroy($propertyId)
    {
        $user = Auth::user();

        Favorite::where('user_id', $user->id)
                ->where('property_id', $propertyId)
                ->delete();

        return redirect()->back()->with('success', 'Favori supprimé.');
    }

    /**
     * Lister les favoris de l'utilisateur connecté.
     */
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorite::with('property')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('favorites.index', compact('favorites'));
    }
}
