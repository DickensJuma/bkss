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
    public function checkFacility($ids) 
    {
        if ( ! is_array($ids)) {
            $ids = [$ids];    
        }
    }

    public function hasAnyFacility($ids): bool
    {
        return (bool) $this->facilities()->whereIn('id', $ids)->first();
    }

    public function hasFacility($id): bool
    {
        return (bool) $this->facilities()->where('facility_id', $id)->first();
    }
}
