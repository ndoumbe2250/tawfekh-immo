<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageBien extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'propertie_id',
        'image_path',
        'is_main',
    ];

    public function property()
    {
        return $this->belongsTo(Propertie::class);
    }
}
