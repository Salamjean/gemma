<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeDoctor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeActive(){
        return $this->where('status', 0);
    }

    public function doctor(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
