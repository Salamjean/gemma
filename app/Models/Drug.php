<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Drug extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function drugHospital() : HasMany
    {
        return $this->hasMany(DrugHospital::class);
    }

    
}
