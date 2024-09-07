<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCar extends Model
{
    use HasFactory;

    // لن نستخدم incrementing لأننا نتعامل مع مفتاح مركب
    public $incrementing = false;

    // لا نحدد مفتاح أساسي هنا لأننا نتعامل مع مفتاح مركب
    protected $primaryKey = ['service_id', 'car_id'];

    protected $fillable = ['service_id', 'car_id'];

    // في عمليات البحث، الإدخال، التحديث والحذف، ستحتاج إلى التعامل مع المفتاح المركب يدويًا

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }


}
