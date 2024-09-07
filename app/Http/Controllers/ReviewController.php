<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    //
      // عرض تفاصيل الخدمة والمراجعات المرتبطة
      public function show($id)
      {
          $service = Service::with(['location', 'reviews.user'])->findOrFail($id);
          $reviews = $service->reviews;

          return view('users.reviews', compact('service', 'reviews'));
      }


      // تخزين مراجعة جديدة
    // تخزين مراجعة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
            'service_id' => 'required|exists:services,id',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'service_id' => $request->input('service_id'),
            'Rating' => $request->input('rating'),
            'Comment' => $request->input('comment'),
        ]);

        return redirect()->route('services.show', ['id' => $request->input('service_id')])
                         ->with('success', 'Review submitted successfully');
    }
}
