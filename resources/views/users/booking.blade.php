<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أكمل حجزك</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .service-info {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
        }
        .service-info img {
            width: 100%;
            height: auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
        .btn:hover {
            background: #0056b3;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>أكمل حجزك</h1>

        <!-- معلومات الخدمة -->
        <div class="service-info">
            <img src="{{ asset('storage/' . $service->car->ImageURL) }}" alt="صورة السيارة">
            <h2>{{ $service->Name }}</h2>
            <p><strong>تفاصيل السيارة:</strong></p>
            <p><i class="fas fa-map-marker-alt"></i> {{ $service->location->Address ?? 'غير متوفر' }}</p>
            <p><i class="fas fa-tachometer-alt"></i> {{ $service->car->Mileage ?? 'غير محدد' }} ميل</p>
            <p><i class="fas fa-cogs"></i> {{ $service->car->Transmission ?? 'يدوي' }}</p>
            <p><i class="fas fa-gas-pump"></i> {{ $service->car->FuelType ?? 'بنزين' }}</p>
            <p><i class="fas fa-users"></i> {{ $service->car->Seats ?? 'غير محدد' }} مقاعد</p>
            <p><strong>السعر:</strong> ${{ $service->Price }}</p>
            <p><strong>القيمة الإجمالية:</strong> ${{$service->Price + $service->car->PricePerDay }}</p>
        </div>

        <!-- نموذج الحجز -->
        <form action="{{ route('booking.store') }}" method="post">
            @csrf
            <input type="hidden" name="car_id" value="{{ $service->car_id }}">
            <input type="hidden" name="service_id" value="{{ $service->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <!-- بيانات الموقع -->
            <div class="form-group">
                <label for="location_name">اسم الموقع</label>
                <input type="text" id="location_name" name="location_name" required>
            </div>
            <div class="form-group">
                <label for="location_address">عنوان الموقع</label>
                <input type="text" id="location_address" name="location_address" required>
            </div>
            <div class="form-group">
                <label for="location_city">المدينة</label>
                <input type="text" id="location_city" name="location_city" required>
            </div>
            <div class="form-group">
                <label for="location_country">البلد</label>
                <input type="text" id="location_country" name="location_country" required>
            </div>

            <!-- بيانات الدفع -->



            <button type="submit" class="btn">تأكيد الحجز</button>
        </form>
    </div>
    <div class="footer">
        <p>جميع الحقوق محفوظة &copy; 2024</p>
    </div>
</body>
</html>
