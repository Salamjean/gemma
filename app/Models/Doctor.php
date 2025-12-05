<?php

namespace App\Models;

use App\Models\User;
use App\Models\Hospital;
use App\Models\Admission;
use App\Models\TypeDoctor;
use App\Models\Declaration;
use App\Models\Consultation;
use App\Models\ModeAdmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function rendezVous(): HasMany
    {
        return $this->hasMany(RendezVous::class);
    }

    public function hospital() : BelongsTo
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }

    public function serviceHospital()
    {
        return $this->belongsTo(ServiceHospital::class, 'service_hospital_id', 'id');
    }

    public function prestationDoctors(): HasMany
    {
        return $this->hasMany(PrestationDoctor::class);
    }

    // public function accessHospitalisation()
    // {
    //     $this->hasMany(AccessDoctorHospitalisation::class, 'doctor_access_id', 'id');
    // }

    public function typeDoctor() : BelongsTo
    {
        return $this->belongsTo(TypeDoctor::class, 'type_doctor_id', 'id');
    }

    public function typeAgent(): BelongsTo
    {
        return $this->belongsTo(TypeAgent::class, 'type_agent_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function consultations(): HasMany
    {
        return $this->hasMany(Consultation::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class, 'doctor_id');
    }

    public function delarations(): HasMany
    {
        return $this->hasMany(Declaration::class);
    }

}
