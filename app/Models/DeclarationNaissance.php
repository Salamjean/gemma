<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeclarationNaissance extends Model
{
    use HasFactory;

    public function declaration(): BelongsTo
    {
        return $this->belongsTo(Declaration::class, 'declaration_id', 'id');
    }

    public function enfant(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'enfant_id', 'id');
    }

}
