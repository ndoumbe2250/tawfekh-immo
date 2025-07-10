<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'email',
        'phone',
        'type_demande',
        'message',
        'properties_id',
        'status',
        'traitee_le',
        'assigned_to',
    ];

    protected $casts = [
        'traitee_le' => 'datetime',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Propertie::class, 'properties_id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
