<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppSettingsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;


Route::get('/',[ServiceController::class,'index']);
Route::get('/booking/{car_id}/{service_id}', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::get('/services/{id}', [ReviewController::class, 'show'])->name('services.show');

Route::group(['middleware'=>'auth'], function ()  {


// حفظ بيانات الحجز
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

// عرض نموذج الدفع
Route::get('/payment/{booking_id}', [BookingController::class, 'showPaymentForm'])->name('pay');

// تأكيد الدفع
Route::post('/payment/confirm/{booking_id}', [BookingController::class, 'confirmPayment'])->name('payment.confirm');
Route::get('/complete', [BookingController::class, 'complete'])->name('users.complete');

Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

});
Route::middleware('auth')->get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[AuthController::class,'CreatUser'])->name('register');
Route::post('/saveuser',[AuthController::class,'store'])->name('save_user_old');
Route::post('/check_usar',[AuthController::class,'checkUser'])->name('check_usar');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
