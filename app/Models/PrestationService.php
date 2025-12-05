<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrestationService extends Model
{
    use HasFactory;

    public function service(){
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

}
