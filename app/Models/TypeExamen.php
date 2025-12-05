<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeExamen extends Model
{
    use HasFactory;

    public function examens()
    {
        return $this->hasMany(Examen::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
}
