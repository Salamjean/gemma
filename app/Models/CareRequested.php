<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CareRequested extends Model
{
    use HasFactory;

    public function drugSale() : HasOne
    {
        return $this->hasOne(DrugSale::class);
    }

    public function careNeeds() : HasMany
    {
        return $this->hasMany(CareNeed::class);
    }

    public function admission(): BelongsTo
    {
        return $this->belongsTo(Admission::class, 'admission_id', 'id');
    }

    public function consultation(): BelongsTo
    {
        return $this->belongsTo(Consultation::class);
    }
}
