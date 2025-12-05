<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\ModeAdmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Secretaire extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
    public function patients() : HasMany
    {
        return $this->hasMany(Patient::class);
    }

    public function admissions(): HasMany
    {
        return $this->hasMany(Admission::class);
    }


}

