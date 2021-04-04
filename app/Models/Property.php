<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    public function taxes(){
        return $this->belongsToMany(Levy::class);
    }
    public function facilities(){
        return $this->belongsToMany(Facility::class);
    }
    public function amenities(){
        return $this->belongsToMany(Amenity::class);
    }
}
