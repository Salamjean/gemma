<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeclarationDeces extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $table = 'declaration_deces';

    public function declaration(): BelongsTo
    {
        return $this->belongsTo(Declaration::class, 'declaration_id', 'id');
    }

    public function enfant(): BelongsTo
    {
        return $this->where('person', 'enfant');
    }

    public function person(): BelongsTo
    {
        return $this->where('person', 'patient');
    }



}
