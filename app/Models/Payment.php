<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function cashier(): BelongsTo
    {
        return $this->belongsTo(Caissiere::class, 'caissiere_id', 'id');
    }

    public function admission(): BelongsTo
    {
        return $this->belongsTo(Admission::class);
    }

    public function hospitalisation(): BelongsTo
    {
        return $this->belongsTo(Hospitalisation::class);
    }

    public function observation(): BelongsTo
    {
        return $this->belongsTo(Observation::class);
    }

    public function typeAssurance(): BelongsTo
    {
        return $this->belongsTo(TypeAssurance::class);
    }

    public function assurance(): HasOne
    {
        return $this->hasOne(Assurance::class);
    }


}
