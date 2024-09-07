<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الدفع</title>
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
        .details {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
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
        .error {
            color: #dc3545;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>تأكيد الدفع</h1>

        <!-- تفاصيل الحجز -->
        <div class="details">
            <h2>تفاصيل الحجز</h2>
            <p><strong>اسم الخدمة:</strong> {{ $booking->service->Name }}</p>
            <p><strong>اسم السيارة:</strong> {{ $booking->car->Brand }}</p>
            <p><strong>تاريخ الحجز:</strong> {{ $booking->Date }}</p>
            <p><strong>المبلغ المطلوب: ${{$booking->service->Price + $booking->service->car->PricePerDay }}</strong> ${{ $booking->total_value }}</p>
        </div>

        <!-- عرض رسائل الخطأ -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- نموذج الدفع -->
        <form action="{{ route('payment.confirm', ['booking_id' => $booking->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="payment_method">طريقة الدفع</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="Credit Card">بطاقة الائتمان</option>
                    <option value="PayPal">باي بال</option>
                    <option value="Cash">نقداً</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">المبلغ  ${{$booking->service->Price + $booking->service->car->PricePerDay }}</label>
                <input type="text" id="amount" name="amount" >
                @error('amount')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">تأكيد الدفع</button>
        </form>
    </div>
    <div class="footer">
        <p>جميع الحقوق محفوظة &copy; 2024</p>
    </div>
</body>
</html>
