<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function amenities(){
        return $this->belongsToMany(Amenity::class);
    }
    public function ratePlans(){
        return $this->belongsToMany(RatePlan::class);
    }
    public function checkAmenity($ids) 
    {
        if ( ! is_array($ids)) {
            $ids = [$ids];    
        }
    }

    public function hasAnyAmenity($ids): bool
    {
        return (bool) $this->amenities()->whereIn('id', $ids)->first();
    }

    public function hasAmenity($id): bool
    {
        return (bool) $this->amenities()->where('amenity_id', $id)->first();
    }
}
