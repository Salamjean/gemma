<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandage extends Model
{
    use HasFactory;

    public function careNeeds()
    {
        return $this->hasMany(CareNeed::class);
    }
}
