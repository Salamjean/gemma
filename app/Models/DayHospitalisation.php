<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DayHospitalisation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function surveillances()
    {
        return $this->hasMany(Surveillance::class);
    }

    public function hospitalisation()
    {
        return $this->belongsTo(Hospitalisation::class, 'hospitalisation_id', 'id');
    }

    public function bed()
    {
        return $this->belongsTo(Bed::class, 'bed_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function infirmier()
    {
        return $this->belongsTo(Infirmier::class, 'infirmier_id', 'id');
    }

    public function therapeutiqueProtocols()
    {
        return $this->hasMany(TherapeutiqueProtocol::class);
    }
}
