<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Payment;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        // احصل على جميع الحجوزات للمستخدم الحالي
        $userBookings = Booking::where('user_id', Auth::id())->get();

        return view('users.bookingsusers', compact('userBookings'));
    }
     // عرض نموذج الحجز
     public function showBookingForm($car_id, $service_id)
     {
         // استرداد بيانات الخدمة بناءً على service_id
         $service = Service::findOrFail($service_id);

         // عرض صفحة الحجز مع تفاصيل الخدمة
         return view('users.booking', [
             'service' => $service,
             'user_id' => Auth::id(), // استرداد معرف المستخدم الحالي
             'location_id' => null // في البداية لا نحتاج إلى location_id
         ]);

         foreach ($services as $service) {
            if ($service->car) {
                $service->total_value = $service->Price + $service->car->PricePerDay; // استخدام 'PricePerDay' من السيارة
            } else {
                $service->total_value = $service->Price; // إذا لم تكن هناك سيارة
            }
        }
     }

     // حفظ بيانات الحجز والموقع
     public function store(Request $request)
     {
         // التحقق من صحة البيانات المدخلة لموقع الحجز
         $validatedLocation = $request->validate([
             'location_name' => 'required|string|max:255',
             'location_address' => 'required|string|max:255',
             'location_city' => 'required|string|max:100',
             'location_country' => 'required|string|max:100',
         ]);

         // إنشاء موقع جديد
         $location = Location::create([
             'Name' => $validatedLocation['location_name'],
             'Address' => $validatedLocation['location_address'],
             'City' => $validatedLocation['location_city'],
             'Country' => $validatedLocation['location_country'],
         ]);

         // التحقق من صحة البيانات المدخلة للحجز
         $validatedBooking = $request->validate([
             'car_id' => 'required|integer',
             'service_id' => 'required|integer',
         ]);

         // إدراج بيانات الحجز
         $booking = Booking::create([
             'user_id' => Auth::id(), // استرداد معرف المستخدم الحالي
             'car_id' => $validatedBooking['car_id'],
             'service_id' => $validatedBooking['service_id'],
             'location_id' => $location->id,
             'Date' => now()->toDateString(), // أو استخدم التاريخ الذي تريده
             'Status' => 'Pending',
         ]);

         // توجيه المستخدم إلى صفحة الدفع مع تمرير معرف الحجز
         return redirect()->route('pay', ['booking_id' => $booking->id]);
     }

     // عرض نموذج الدفع
     public function showPaymentForm($booking_id)
     {
         // استرداد الحجز باستخدام المعرف
         $booking = Booking::findOrFail($booking_id);

         // حساب المبلغ الإجمالي
         $total_value = $booking->service->Price; // افترض أن السعر يأتي من خدمة

         // عرض صفحة الدفع مع بيانات الحجز
         return view('users.payment', [
             'booking' => $booking,
             'total_value' => $total_value,
         ]);
     }

     // تأكيد الحجز وإدخال بيانات الدفع
     public function confirmPayment(Request $request, $booking_id)
     {
         // Validate payment data
         $validatedPayment = $request->validate([
             'payment_method' => 'required|string',
             'amount' => 'required|numeric',
         ], [
             'amount.numeric' => 'يجب أن يكون المبلغ رقماً.',
         ]);

         // Retrieve the booking
         $booking = Booking::findOrFail($booking_id);

         // Check if the entered amount matches the required amount
         if ($validatedPayment['amount'] != $booking->service->Price) {
             return redirect()->back()->withErrors(['amount' => 'المبلغ المدخل لا يتطابق مع المبلغ المطلوب.']);
         }

         // Save payment details
         Payment::create([
             'booking_id' => $booking->id,
             'Amount' => $validatedPayment['amount'],
             'PaymentDate' => now()->toDateString(),
             'PaymentMethod' => $validatedPayment['payment_method'],
         ]);

         // Update booking status to "Confirmed"
         $booking->update(['Status' => 'Confirmed']);

         // Redirect with success message
         return redirect()->route('users.complete')->with('success', 'تم تأكيد الحجز والدفع بنجاح!');
     }
     public function complete()
{
    // Return a view or handle completion logic
    return view('users.complete'); // Ensure this view exists
}
}
