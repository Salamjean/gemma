<?php

namespace App\Models;

use App\Models\Consultation;
use App\Models\Hospitalisation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuivieHospitalisation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hospitalisation(): BelongsTo
    {
        return $this->belongsTo(Hospitalisation::class, 'hospitalisation_id', 'id');
    }
    
}
