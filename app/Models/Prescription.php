<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Prescription extends Model
{
    use HasFactory;

    public function ordonnance(): BelongsTo
    {
        return $this->belongsTo(Ordonnance::class, 'ordonnance_id', 'id');
    }

    public function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class, 'drug_id', 'id');
    }

    public function drugHospital(): BelongsTo
    {
        return $this->belongsTo(DrugHospital::class, 'drug_id', 'id');
    }

}
