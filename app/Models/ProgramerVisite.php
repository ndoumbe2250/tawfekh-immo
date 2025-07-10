<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramerVisite extends Model
{
    use HasFactory;
     protected $fillable = [
        'property_id',
        'visitor_name',
        'visitor_email',
        'visitor_phone',
        'visit_date',
        'message',
        'status',
        'agent_id',
        'notes',
    ];

    protected $dates = ['visit_date'];

    public function property()
    {
        return $this->belongsTo(Propertie::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
