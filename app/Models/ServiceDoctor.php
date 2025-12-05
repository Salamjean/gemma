<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceDoctor extends Model
{
    use HasFactory;

    public function service() : BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function doctor() : BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

}
