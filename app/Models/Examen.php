<?php

namespace App\Models;

use App\Models\Consultation;
use App\Models\BulletinExamen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bulletin_examen()
    {
        return $this->belongsTo(BulletinExamen::class, 'bulletin_examen_id', 'id');
    }
}
