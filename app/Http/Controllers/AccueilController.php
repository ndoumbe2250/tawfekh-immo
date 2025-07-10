<?php

namespace App\Http\Controllers;

use App\Models\Propertie;
use App\Models\PropertyView;
use App\Models\TypeProperty;
use Illuminate\Http\Request;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class AccueilController extends Controller
{
    /**
     * Display the welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $propriétés = Propertie::where('en_vedette', true)
                        ->orderBy('created_at', 'desc')
                        ->take(6) // Limit to 6 featured properties
                        ->get();
            $typePropriété=TypeProperty::all();
        // This method returns the view for the welcome page.
        return view('Accueil.accueil', compact('propriétés', 'typePropriété'));
    }
    /**
     * Display the properties page.
     *
     * @return \Illuminate\View\View
     */
    public function properties()
    {
        $propriétés = Propertie::where('status', 'disponible')
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);
        $typePropriété=TypeProperty::all();
        
        // This method returns the view for the properties page.
         return view('Accueil.properties', compact('propriétés','typePropriété'));
        
    }
    /**
     * Display the property details page.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $propriété = Propertie::findOrFail($id);
        

        $alreadyViewed = PropertyView::where('property_id', $propriété->id)
            ->where(function ($q) {
                if (auth()->check()) {
                    $q->where('user_id', auth()->id());
                } else {
                    $q->where('ip_address', request()->ip());
                }
            })
            ->where('created_at', '>=', now()->subMinutes(30))
            ->exists();

            if (! $alreadyViewed) {
            PropertyView::create([
                'property_id' => $propriété->id,
                'user_id' => auth()->id(), // null si non connecté
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                
            ]);

        }
       
        // 🔥 Supprimer les plus anciennes si l'utilisateur a + de 5 vues
    if (auth()->check()) {
        $userViews = PropertyView::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        if ($userViews->count() > 5) {
            // Supprimer les vues les plus anciennes (sauf les 5 dernières)
            $viewsToDelete = $userViews->slice(5); // à partir du 6e
            PropertyView::destroy($viewsToDelete->pluck('id'));
        }
    }
        // This method returns the view for a specific property.
        return view('Accueil.showPropertie', compact('propriété'));
    }
}
