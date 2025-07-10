<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertie extends Model
{
    use HasFactory;
        protected $fillable = [
        'title',
        'slug',
        'description',
        'transaction_type',
        'prix',
        'prix_m2',
        'surface_habitable',
        'surface_terrain',
        'nb_chambres',
        'nb_salles_bain',
        'nb_etages',
        'pieces',
        'etage',
        'annee_construction',
        'etat',
        'garage',
        'jardin',
        'terrasse',
        'balcon',
        'meuble',
        'address',
        'type_properties_id',
        'user_id',
        'status',
        'en_vedette',
        'is_active',
        'adtif',
        'publie_le',
    ];

    public function typeProperty()
    {
        return $this->belongsTo(TypeProperty::class, 'type_properties_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function favorites()
{
    return $this->hasMany(Favorite::class);
}
    public function images()
    {
        return $this->hasMany(ImageBien::class);
    }


}
