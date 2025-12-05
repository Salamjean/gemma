<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Consultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Observation extends Model
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

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function pathologies(): HasMany
    {
        return $this->hasMany(Pathologie::class, 'observation_id', 'id');
    }

    public function soins(): HasMany
    {
        return $this->hasMany(SoinsAdministre::class, 'observation_id', 'id');
    }

    public function traitements(): HasMany
    {
        return $this->hasMany(Traitement::class, 'observation_id', 'id');
    }
}
