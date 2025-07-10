<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PropertyView;
use Illuminate\Http\Request;
use App\Models\ProgramerVisite;
use App\Models\Propertie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire d'inscription
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Traite l'inscription d'un nouvel utilisateur
     */
    public function register(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->prenom . ' ' . $request->nom,
            'email' => $request->email,
            'role' => 'client', // Par défaut, le rôle est 'client'
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Connexion automatique après inscription
        Auth::login($user);

        return redirect()->intended('/client/login')
            ->with('success', 'Inscription réussie !');
    }

    /**
     * Affiche le formulaire de connexion
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Traite la tentative de connexion
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/')
                ->with('success', 'Connexion réussie !');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'utilisateur
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    /**
     * Affiche le tableau de bord de l'utilisateur connecté
     */
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('client.login')->with('error', 'Veuillez vous connecter pour accéder au tableau de bord.');
        }
        $properties = Auth::user()->favoriteProperties()->get();
        
         $visites = ProgramerVisite::where('visitor_email', $user->email)
                ->orderBy('visit_date', 'desc')
                ->get();
      
        $userId = $user->id;
        $propertiesviewed = Propertie::whereIn('id', function ($query) use ($userId) {
            $query->select('property_id')
                ->from('property_views')
                ->where('user_id', $userId);
        })->get();
// dd($propertiesviewed);
        return view('client.dashboard', compact('user', 'properties', 'visites', 'propertiesviewed'));
    }
}