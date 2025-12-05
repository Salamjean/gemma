<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DrugHospital extends Model
{
    use HasFactory;

    public function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class, 'drug_id', "id");
    }

    public function pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id', "id");
    }

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', "id");
    }

    public function careDrug(): HasMany
    {
        return $this->hasMany(CareDrug::class);
    }

    public function therapeutiqueProtocol(): HasOne
    {
        return $this->hasOne(TherapeutiqueProtocol::class);
    }
}
