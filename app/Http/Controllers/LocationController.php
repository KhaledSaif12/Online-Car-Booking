<?php

namespace App\Http\Controllers;
use App\Models\Location;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'City' => 'required|string|max:100',
            'Country' => 'required|string|max:100',
        ]);

        // إنشاء موقع جديد
        $location = Location::create($validated);

        // إعادة التوجيه مع `location_id` إلى النموذج التالي
        return redirect()->route('completeBookingForm')->with('location_id', $location->id);
    }

}
