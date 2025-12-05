<?php

namespace App\Models;

use App\Models\Admission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caissiere extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hospital() : BelongsTo
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }

}
