<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDeclaration extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function declarations()
    {
        return $this->hasMany(Declaration::class);
    }
}
