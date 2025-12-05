<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OccupiedBed extends Model
{
    use HasFactory;

    public function bed(): BelongsTo
    {
        return $this->belongsTo(Bed::class, 'bed_id', 'id')->where('delete', 0);
    }

    public function hospitalisation(): BelongsTo
    {
        return $this->belongsTo(Hospitalisation::class, 'hospitalisation_id', 'id');
    }
}
