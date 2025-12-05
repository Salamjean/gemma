<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CareDrug extends Model
{
    use HasFactory;

    public function drugHospital(): BelongsTo
    {
        return $this->belongsTo(DrugHospital::class);
    }

    public function careNeed(): BelongsTo
    {
        return $this->belongsTo(CareNeed::class);
    }
}
