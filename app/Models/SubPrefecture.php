<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubPrefecture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function patientBirthPlaces() : HasMany
    {
        return $this->hasMany(Patient::class, 'lieu_de_naissance_id', 'id');
    }

    public function patientHabitualResidences(): HasMany
    {
        return $this->hasMany(Patient::class, 'residence_habituelle_id', 'id');
    }

    public function patientCurrentResidences(): HasMany
    {
        return $this->hasMany(Patient::class, 'residence_actuelle_id', 'id');
    }

    public function hospitalPlace(): HasMany
    {
        return $this->hasMany(Hospital::class, 'localite', 'id');
    }
}
