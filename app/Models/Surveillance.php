<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveillance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dayHospitalisation()
    {
        return $this->belongsTo(DayHospitalisation::class, 'day_hospitalisation_id', 'id');
    }
}
