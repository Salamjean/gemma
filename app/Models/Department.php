<?php

namespace App\Models;

use App\Models\Region;
use App\Models\SubPrefecture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function subPrefectures()
    {
        return $this->hasMany(SubPrefecture::class, 'sub_prefecture_id', 'id');
    }
}
