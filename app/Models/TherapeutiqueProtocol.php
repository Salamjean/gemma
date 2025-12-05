<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapeutiqueProtocol extends Model
{
    use HasFactory;

    public function protocolHourApplications()
    {
        return $this->hasMany(ProtocolHourApplication::class);
    }

    public function hospitalisationDrugRequested()
    {
        return $this->belongsTo(HospitalisationDrugRequested::class);
    }

    public function dayHospitalisation()
    {
        return $this->belongsTo(DayHospitalisation::class, 'day_hospitalisation_id', 'id');
    }




    public function drugHospital()
    {
        return $this->belongsTo(DrugHospital::class, 'drug_hospital_id', 'id');
    }

    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_hospital_id', 'id');
    }
}
