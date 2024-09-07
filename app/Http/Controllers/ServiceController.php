<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    //
    public function index()
    {
     // جلب جميع الخدمات مع السيارات المرتبطة بها
     $services = Service::with('car')->get();

     // حساب قيمة الخدمة مضروبة في قيمة السيارة
     foreach ($services as $service) {
         if ($service->car) {
             $service->total_value = $service->Price + $service->car->PricePerDay; // استخدام 'PricePerDay' من السيارة
         } else {
             $service->total_value = $service->Price; // إذا لم تكن هناك سيارة
         }
     }

     return view('users.index', compact('services'));
    }
}
