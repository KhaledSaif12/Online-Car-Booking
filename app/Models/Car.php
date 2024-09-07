<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['Model', 'Brand', 'Size', 'Transmission', 'FuelType', 'Seats', 'Mileage', 'PricePerDay', 'ImageURL'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    // العلاقة مع الخدمات (إذا كانت One-to-One، لا داعي لـ belongsToMany)
    public function service()
    {
        return $this->hasOne(Service::class, 'car_id');
    }


}
