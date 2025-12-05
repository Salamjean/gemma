<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hospitalisation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function consultation(): BelongsTo
    {
        return $this->belongsTo(Consultation::class, 'consultation_id', 'id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }


    public function daysHospitalisation(): HasMany
    {
        return $this->hasMany(DayHospitalisation::class);
    }

    public function operations(): HasMany
    {
        return $this->hasMany(Operation::class);
    }


    public function occupiedBed(): HasOne
    {
        return $this->hasOne(OccupiedBed::class);
    }


}
