<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrugSale extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function ordonnance():BelongsTo
    {
        return $this->belongsTo(Ordonnance::class);
    }

    public function careRequested():BelongsTo
    {
        return $this->belongsTo(CareRequested::class, 'care_requested_id', 'id');
    }

    public function hospitalisationDrugRequested(): BelongsTo
    {
        return $this->belongsTo(HospitalisationDrugRequested::class, 'hospitalisation_drug_requested_id', 'id');
    }

    public function pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class);
    }

}
