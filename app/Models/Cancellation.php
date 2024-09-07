<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancellation extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'CancellationDate', 'RefundAmount'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
