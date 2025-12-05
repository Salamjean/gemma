<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\Assurance;
use App\Models\Caissiere;
use App\Models\Infirmier;
use App\Models\Secretaire;
use App\Models\TypeExamen;
use App\Models\Departement;
use App\Models\Consultation;
use App\Models\CareRequested;
use App\Models\ModeAdmission;
use App\Models\TypeAdmission;
use App\Models\TypeAssurance;
use App\Models\TypeConsultaion;
use App\Models\TypeConsultation;
use App\Models\PrestationHospital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admission extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded =[];

    public function prestationHospital(): BelongsTo
    {
        return $this->belongsTo(PrestationHospital::class, 'prestation_hopital_id', 'id');
    }

    public function assurance(): HasOne
    {
        return $this->hasOne(Assurance::class);
    }

    public function consultation(): HasOne
    {
        return $this->hasOne(Consultation::class);
    }

    public function careRequest() : HasOne
    {
        return $this->hasOne(CareRequested::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
    public function infirmier()
    {
        return $this->belongsTo(Infirmier::class, 'infirmier_id', 'id');
    }
    public function cashier()
    {
        return $this->belongsTo(Caissiere::class, 'caissiere_id', 'id');
    }

    public function secretariat() : BelongsTo
    {
        return $this->belongsTo(Secretaire::class, 'secretaire_id', 'id');
    }

    public function typeExamen() : BelongsTo
    {
        return $this->belongsTo(TypeExamen::class, 'type_examen_id', 'id');
    }
    public function typeAssurance() : BelongsTo
    {
        return $this->belongsTo(TypeAssurance::class, 'type_assurance_id', 'id');
    }

}
