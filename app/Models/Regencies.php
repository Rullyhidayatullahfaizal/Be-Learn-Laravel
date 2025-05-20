<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regencies extends Model
{
    public function province()
    {
        return $this->belongsTo(Provinces::class);
    }

    public function districts()
    {
        return $this->hasMany(Districts::class);
    }
}
