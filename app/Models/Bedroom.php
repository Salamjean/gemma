<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bedroom extends Model
{
    use HasFactory;

    public function beds(): HasMany
    {
        return $this->hasMany(Bed::class)->where('delete', 0);
    }
    
    public function collective() : HasMany
    {
        return $this->hasMany(Bed::class)->where('delete', 0);
    }

    public function individual()
    {
        return $this->hasOne(Bed::class)->where('delete', 0);
    }

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
}
