<?php

namespace App\Models;

use App\Models\Observation;
use App\Models\Hospitalisation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SoinsAdministre extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hospitalisation()
    {
        return $this->belongsTo(Hospitalisation::class, 'hospitalisation_id', 'id');
    }
    public function observation()
    {
        return $this->belongsTo(Observation::class, 'observation_id', 'id');
    }
    public function suivie_hospitalisation()
    {
        return $this->belongsTo(SuivieHospitalisation::class, 'suivie_hospitalisation_id', 'id');
    }
}
