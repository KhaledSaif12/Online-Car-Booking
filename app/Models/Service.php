<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['Name', 'Description', 'Price', 'location_id', 'car_id']; // إضافة car_id إلى fillable

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    // علاقة مع Location
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
