<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['Name', 'Address', 'City', 'Country'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // علاقة مع Service
    public function services()
    {
        return $this->hasMany(Service::class, 'location_id');
    }
}
