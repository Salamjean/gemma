<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bed extends Model
{
    use HasFactory;

    public function bedroom() :BelongsTo
    {
        return $this->belongsTo(Bedroom::class, 'bedroom_id', 'id');
    }

    public function occupiedBeds(): HasMany
    {
        return $this->hasMany(OccupiedBed::class)->where('delete', 0);
    }

    public function occupiedBedActive(): HasOne
    {
        return $this->hasOne(OccupiedBed::class)->where('status', 'active')->where('delete', 0);
    }

}
