<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeAssurance extends Model
{
    use HasFactory;


    public function assurances(): HasMany
    {
        return $this->hasMany(Assurance::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }






}
