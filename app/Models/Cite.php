<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{
    use HasFactory;
       protected $fillable = [
        'name',
        'slug',
        'department',
        'region',
        'latitude',
        'longitude',
        'is_active',
    ];
}
