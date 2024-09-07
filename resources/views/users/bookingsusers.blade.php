<!-- resources/views/bookings/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for styling -->
    <style>
        .booking-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <h1 class="mb-4">Your Bookings</h1>
<h2>To delete or modify, contact the admin.</h2>
        @if($userBookings->isEmpty())
            <div class="alert alert-info" role="alert">
                You have no bookings yet.
            </div>
        @else
            <div class="list-group">
                @foreach($userBookings as $booking)
                    <div class="booking-details list-group-item">
                        <h5>Service: {{ $booking->service->Name }}</h5>
                        <p><strong>Location:</strong> {{ $booking->location ? $booking->location->Address : 'Not available' }}</p>
                        <p><strong>Booking Status:</strong> {{ ucfirst($booking->status) }}</p>
                        <p><strong>Price:</strong>  ${{$booking->service->Price + $booking->service->car->PricePerDay }}</p>
                        <p><strong>Booked At:</strong> {{ $booking->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
