<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petlatihan extends Model {

    protected $fillable = ["name","type"];

     public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst($value);
    }

    public function getNameAttribute($value) {
        return strtoupper($value);
    }

}
