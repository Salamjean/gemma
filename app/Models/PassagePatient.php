<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassagePatient extends Model
{
    use HasFactory;

    public function hopital()
    {
        return $this->belongsTo(Hospital::class, 'hopital_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
}
