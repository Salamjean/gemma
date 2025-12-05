<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CareNeed extends Model
{
    use HasFactory;

    public function careDrugs() : HasMany
    {
        return $this->hasMany(CareDrug::class);
    }

    public function care() : BelongsTo
    {
        return $this->belongsTo(Care::class);
    }
    public function injection(): BelongsTo
    {
        return $this->belongsTo(Injection::class);
    }
    public function bandage(): BelongsTo
    {
        return $this->belongsTo(Bandage::class);
    }
    public function careRequest(): BelongsTo
    {
        return $this->belongsTo(CareRequested::class);
    }

}
