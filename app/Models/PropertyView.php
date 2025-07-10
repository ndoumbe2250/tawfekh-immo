<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyView extends Model
{
    use HasFactory;
     protected $fillable = [
        'property_id',
        'user_id', 
        'ip_address',
        'user_agent',
        'viewed_at',    
    ];

     public function property()
    {
        return $this->belongsTo(Propertie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
