<?php

use App\Models\User;
use App\Models\Contact;
use App\Models\Favorite;
use App\Models\Propertie;
use App\Models\TypeProperty;
use App\Models\ProgramerVisite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CiteController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ImageBienController;
use App\Http\Controllers\PropertieController;
use App\Http\Controllers\TypePropertyController;
use App\Http\Controllers\ProgramerVisiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[AccueilController::class,'index'])->name('accueil.index');
Route::get('/biensList', [AccueilController::class, 'properties'])->name('accueil.biens');
Route::get('/biens/{id}', [AccueilController::class, 'show'])->name('accueil.bien.show');

Route::view('/chat', 'Accueil.chat')->name('accueil.chat');
Route::post('/chatagent', [ChatController::class, 'chat'])->name('accueil.chat.post');


// Route::get('/', function () {
//     return view('Accueil.accueil' , compact('nom'));
// })->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard12');
// })->middleware(['auth', 'verified'])->name('dashboard');;,

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard12');
//     });
// });
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard12',
        [
        'disponibles' => Propertie::where('status', 'disponible')->count(),
        'contactsEnAttente' => Contact::where('status', 'en_attente')->count(),
        'lastContacts' => Contact::latest()->take(5)->get(),
        'visitesAVenir' => ProgramerVisite::where('visit_date', '>', now())->count(),
        'nextVisites' => ProgramerVisite::where('visit_date', '>', now())->orderBy('visit_date')->take(5)->get(),
        'totalFavoris' => Favorite::count(),
        'agents' => User::where('role', 'agent')->count(),
        'typesActifs' => TypeProperty::where('is_active', true)->count(),
        'lastProperties' => Propertie::latest()->take(5)->get()
    ]);
    })->name('dashboard.admin');
    Route::resource('type_properties', TypePropertyController::class);
    Route::resource('properties', PropertieController::class);
    Route::resource('images', ImageBienController::class);
});

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', function () {
        return view('agent.dashboard12',
        [
        'disponibles' => Propertie::where('status', 'disponible')->count(),
        'contactsEnAttente' => Contact::where('status', 'en_attente')->count(),
        'lastContacts' => Contact::latest()->take(5)->get(),
        'visitesAVenir' => ProgramerVisite::where('visit_date', '>', now())->count(),
        'nextVisites' => ProgramerVisite::where('visit_date', '>', now())->orderBy('visit_date')->take(5)->get(),
        'totalFavoris' => Favorite::count(),
        'agents' => User::where('role', 'agent')->count(),
        'typesActifs' => TypeProperty::where('is_active', true)->count(),
        'lastProperties' => Propertie::latest()->take(5)->get()
    ]);
    })->name('dashboard.admin');
});

 Route::resource('contacts', ContactController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/favoris', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::delete('/favoris/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::post('/favoris/{id}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::resource('programer_visites', ProgramerVisiteController::class);
});

Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->middleware('auth');

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent', function () {
        return view('agent.dashboard12');
    });
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard12');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// client routes

Route::prefix('client')->group(function () {

        Route::view('/register', 'client.register')->name('client.register');
        Route::view('/login', 'client.login')->name('client.login');
        
        Route::post('/register', [AuthController::class, 'register'])->name('client.register.post');

        Route::post('/login', [AuthController::class, 'login'])->name('client.login.post');
        Route::post('/logout', [AuthController::class, 'logout'])->name('client.logout');
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('client.dashboard')->middleware('auth');
});

Route::get('/ajax-search', [PropertieController::class, 'ajaxSearch'])->name('properties.ajax.search');


require __DIR__.'/auth.php';
