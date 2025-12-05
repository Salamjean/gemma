<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistreConsultationCurative extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function registre()
    {
        return $this->belongsTo(Registre::class, 'registre_id', 'id');
    }
}
