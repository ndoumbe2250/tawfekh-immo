<?php

namespace App\Http\Controllers;

use App\Models\ImageBien;
use App\Models\Propertie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageBienController extends Controller
{
       public function index()
    {
        $images = ImageBien::with('property')->get();
        return view('image_biens.index', compact('images'));
    }

    public function create()
    {
        $properties = Propertie::all();
        return view('image_biens.create', compact('properties'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'propertie_id' => 'required|exists:properties,id',
        'image_path.*' => 'required|image|mimes:jpeg,png,jpg,gif', // max 5MB per file
    ]);

    $isMainRequested = $request->has('is_main');
    $files = $request->file('image_path');
$originalNames = [];

foreach ($files as $index => $file) {
    $originalName = $file->getClientOriginalName();

    // Évite les doublons de fichiers identiques
    if (in_array($originalName, $originalNames)) {
        continue;
    }

    $originalNames[] = $originalName;

    $imageName = time() . '_' . $index . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('biens'), $imageName);


        \App\Models\ImageBien::create([
            'propertie_id' => $request->propertie_id,
            'image_path' =>$imageName,
            'is_main' => $isMainRequested && $index === 0, // première image cochée principale
        ]);
    }

    return redirect()->route('images.index')->with('success', 'Images ajoutées avec succès.');
}


    public function edit(ImageBien $imageBien)
    {
        $properties = Propertie::all();
        return view('image_biens.edit', compact('imageBien', 'properties'));
    }

    public function update(Request $request, ImageBien $imageBien)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_main' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($imageBien->image_path);
            $path = $request->file('image')->store('properties', 'public');
            $imageBien->image_path = $path;
        }

        $imageBien->property_id = $validated['property_id'];
        $imageBien->is_main = $request->input('is_main', false);
        $imageBien->save();

        return redirect()->route('image-biens.index')->with('success', 'Image mise à jour.');
    }

    public function destroy(ImageBien $imageBien)
    {
        // Storage::disk('public')->delete($imageBien->image_path);
    //    $imageName = $imageBien->image_path;

    //             if ($imageName && file_exists(public_path('biens/' . $imageName))) {
    //                 @unlink(public_path('biens/' . $imageName));
    //             }
        $imageBien->delete();
     
        return redirect()->route('images.index')->with('success', 'Image supprimée.');
    }
}
