<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProtocolHourApplication extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function therapeutiqueProtocol()
    {
        return $this->belongsTo(TherapeutiqueProtocol::class, 'therapeutique_protocol_id', 'id');
    }
}
