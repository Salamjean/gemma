<?php

namespace App\Models;

use App\Models\Admission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assurance extends Model
{
    use HasFactory;

    public function typeAssurance()
    {
        return $this->belongsTo(TypeAssurance::class, 'type_assurance_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function cashier()
    {
        return $this->belongsTo(Caissiere::class, 'caissiere_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
    public function admission(): BelongsTo
    {
        return $this->belongsTo(Admission::class, 'admission_id', 'id');
    }

}
