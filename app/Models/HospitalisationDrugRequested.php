<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HospitalisationDrugRequested extends Model
{
    use HasFactory;

    public function drugSales(): HasOne
    {
        return $this->hasOne(DrugSale::class);
    }


    public function therapeutiqueProtocols(): HasMany
    {
        return $this->hasMany(TherapeutiqueProtocol::class, 'hospitalisation_drug_requested_id', 'id');
    }

    public function hospitalisation()
    {
        return $this->belongsTo(Hospitalisation::class, 'hospitalisation_id', 'id');
    }
}
