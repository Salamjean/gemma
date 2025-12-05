<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registre extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'type_consultation',
        'code',
        'issue_consultation',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id', 'id');
    }

    public function registreAccouchement()
    {
        return $this->hasOne(RegistreAccouchement::class);
    }

    public function registreConsultationCurative()
    {
        return $this->hasOne(RegistreConsultationCurative::class);
    }

    public function registreConsultationPreNatale()
    {
        return $this->hasOne(RegistreConsultationPreNatale::class);
    }

    public function registreConsultationPostNatale()
    {
        return $this->hasOne(RegistreConsultationPostNatale::class);
    }
}
