<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $table = 'rendez_vouses'; // Important: nom de la table

    protected $fillable = [
        'image',
        'title',
        'date',
        'heure',
        'motif',
        'details',
        'consultation_id',
        'doctor_id',
        'patient_id',
        'status'
    ];
    protected $casts = [
        'details' => 'array',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

     public function doctorUser()
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('role_as', 'doctor');
    }

    // Relation avec le profil doctor (table doctors)
    public function doctorProfile()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'doctor_id', 'user_id');
    }

    // Pour simplifier
    public function getDoctorAttribute()
    {
        return $this->doctorUser;
    }
}
