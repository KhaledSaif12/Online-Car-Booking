<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Travila
  </title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <link href="{{asset('Users/assets/css/style.css')}}" rel="stylesheet" />
  <script src="{{ asset('/Users//assets/js/index1.js') }}"></script>

 </head>
 <body>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img alt="Travila Logo" height="40" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-BVbpSZmLndA7MfHIxv2ahIKS/user-IBY8IaMXtVn7IVIdZeyvjx16/img-xtqTojXRUXQ9UWc1HiNL445Y.png?st=2024-09-05T06%3A56%3A13Z&amp;se=2024-09-05T08%3A56%3A13Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-04T21%3A28%3A29Z&amp;ske=2024-09-05T21%3A28%3A29Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=s7%2BsI7a/h0G3s922crUDXiFs7MRXBFuUHvx7HGRwaTo%3D" width="150"/>
                </a>
                <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        @if(Auth::check())
                        <li class="nav-item"><a class="btn btn-primary" href="{{ route('bookings.index') }}">My Bookings</a>
                        </li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="#">Destinations</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Activities</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Hotel</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Rental</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Tickets</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Pages</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-primary" href="#">Become Local Expert</a></li>
                    </ul>

        <!-- Header Buttons -->
        <div class="d-flex justify-content-end mb-4">
            @if(Auth::check())
                <div class="header-buttons ms-3">
                    <span class="btn btn-secondary me-2">{{ Auth::user()->name }}</span>
                    <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>

                </div>
            @else
                <div class="header-buttons ms-3">
                    <a class="btn btn-primary" href="{{ route('register')}}">Sign Up</a>
                    <a class="btn btn-secondary" href="{{ route('logout')}}">Login</a>
                </div>
            @endif
        </div>
                </div>
            </div>
        </nav>

  <section class="hero-section">
   <div class="container">
    <button class="btn btn-explore">
     Explore the World
    </button>
    <h1>
     Unveil the Beauty of the World Every Day
    </h1>
    <p>
     Travel Without Limits Browse, Book, Explore
    </p>
    <div class="app-buttons">
     <img alt="Google Play" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-BVbpSZmLndA7MfHIxv2ahIKS/user-IBY8IaMXtVn7IVIdZeyvjx16/img-DHrE5CAYSeyUCDomvc5fnPv3.png?st=2024-09-05T06%3A56%3A15Z&amp;se=2024-09-05T08%3A56%3A15Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-04T21%3A43%3A29Z&amp;ske=2024-09-05T21%3A43%3A29Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=iYeO7Wv1gVGGh6a9jCUMITpwbaltkstZ6V8Ujc/XuP8%3D" width="150"/>
     <img alt="App Store" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-BVbpSZmLndA7MfHIxv2ahIKS/user-IBY8IaMXtVn7IVIdZeyvjx16/img-cAcwVwbTL3nPABFnmfyrUxDK.png?st=2024-09-05T06%3A56%3A13Z&amp;se=2024-09-05T08%3A56%3A13Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-04T21%3A24%3A26Z&amp;ske=2024-09-05T21%3A24%3A26Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=vGeXpI6UyS9WvzlhwiQd4SEikQRqifiqXntRaazI1Vw%3D" width="150"/>
    </div>
   </div>
  </section>
  <section class="search-section container">
   <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
     <button aria-controls="tours" aria-selected="true" class="nav-link active" data-bs-target="#tours" data-bs-toggle="tab" id="tours-tab" role="tab" type="button">
      Tours
     </button>
    </li>
    <li class="nav-item" role="presentation">
     <button aria-controls="hotels" aria-selected="false" class="nav-link" data-bs-target="#hotels" data-bs-toggle="tab" id="hotels-tab" role="tab" type="button">
      Hotels
     </button>
    </li>
    <li class="nav-item" role="presentation">
     <button aria-controls="tickets" aria-selected="false" class="nav-link" data-bs-target="#tickets" data-bs-toggle="tab" id="tickets-tab" role="tab" type="button">
      Tickets
     </button>
    </li>
    <li class="nav-item" role="presentation">
     <button aria-controls="rental" aria-selected="false" class="nav-link" data-bs-target="#rental" data-bs-toggle="tab" id="rental-tab" role="tab" type="button">
      Rental
     </button>
    </li>
    <li class="nav-item" role="presentation">
     <button aria-controls="activities" aria-selected="false" class="nav-link" data-bs-target="#activities" data-bs-toggle="tab" id="activities-tab" role="tab" type="button">
      Activities
     </button>
    </li>
   </ul>
   <div class="tab-content" id="myTabContent">
    <div aria-labelledby="tours-tab" class="tab-pane fade show active" id="tours" role="tabpanel">
     <form class="row g-3 mt-3">
      <div class="col-md-3">
       <label class="form-label" for="location">
        Location
       </label>
       <input class="form-control" id="location" placeholder="New York, USA" type="text"/>
      </div>
      <div class="col-md-2">
       <label class="form-label" for="checkin">
        Check In
       </label>
       <input class="form-control" id="checkin" type="date"/>
      </div>
      <div class="col-md-2">
       <label class="form-label" for="checkout">
        Check Out
       </label>
       <input class="form-control" id="checkout" type="date"/>
      </div>
      <div class="col-md-3">
       <label class="form-label" for="guests">
        Guests
       </label>
       <input class="form-control" id="guests" placeholder="2 adults, 2 children" type="text"/>
      </div>
      <div class="col-md-2 d-flex align-items-end">
       <button class="btn btn-search w-100" type="submit">
        Search
       </button>
      </div>
     </form>
    </div>
    <!-- Add other tab panes for Hotels, Tickets, Rental, Activities as needed -->
   </div>
  </section>
  <section class="recent-cars-section">
   <div class="container">
    <h2>
     Recent Launched Cars
    </h2>
    <p>
     The world's leading car brands
    </p>

    <div class="container">
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <i class="far fa-heart favorite" id="favoriteIcon{{ $service->id }}"></i>
                        <a href="{{ route('services.show', ['id' => $service->id]) }}">

                            <img alt="Service Image" height="200" src="{{ asset('storage/'. $service->car->ImageURL ) }}" width="300"/>
                        </a>
                        <div class="rating">
                            <i class="fas fa-star star"></i>
                            <span>4.96</span>
                            <span class="reviews">(672 reviews)</span>
                        </div>
                        <div class="title">
                            {{ $service->Name }}
                        </div>
                        <div class="location">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $service->location->Address ?? 'Location Not Available' }}
                        </div>
                        <div class="details">
                            <div><i class="fas fa-tachometer-alt"></i> {{ $service->car->Mileage ?? 'N/A' }} miles</div>
                            <div><i class="fas fa-cogs"></i> {{ $service->car->Transmission ?? 'Manual' }}</div>
                        </div>
                        <div class="details">
                            <div><i class="fas fa-gas-pump"></i> {{ $service->car->FuelType ?? 'Gasoline' }}</div>
                            <div><i class="fas fa-users"></i> {{ $service->car->Seats ?? 'N/A' }} seats</div>
                        </div>
                        <div class="price">
                            from ${{ $service->Price }}
                        </div>
                        <div class="total-value">
                            Total Value: ${{ $service->total_value }}
                        </div>
                        <div class="book-now">
                            <a href="{{ route('booking.form', ['car_id' => $service->car_id, 'service_id' => $service->id, 'user_id' => auth()->id()]) }}" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
   </div>
  </section>
  <!-- Footer -->
  <section class="footer">
    <div class="row">
     <div class="col-md-4">
      <h5>
       Contact Us
      </h5>
      <p>
       1234 Street Name, City, State, 12345
      </p>
      <p>
       Phone: 1800-622-8888
      </p>
      <p>
       Email: info@travlia.com
      </p>
     </div>
     <div class="col-md-4">
      <h5>
       Quick Links
      </h5>
      <ul class="list-unstyled">
       <li>
        <a href="#">
         Home
        </a>
       </li>
       <li>
        <a href="#">
         About
        </a>
       </li>
       <li>
        <a href="#">
         Services
        </a>
       </li>
       <li>
        <a href="#">
         Contact
        </a>
       </li>
      </ul>
     </div>
     <div class="col-md-4">
      <h5>
       Follow Us
      </h5>
      <a class="me-2" href="#">
       <i class="fab fa-facebook-f">
       </i>
      </a>
      <a class="me-2" href="#">
       <i class="fab fa-twitter">
       </i>
      </a>
      <a class="me-2" href="#">
       <i class="fab fa-instagram">
       </i>
      </a>
      <a href="#">
       <i class="fab fa-linkedin-in">
       </i>
      </a>
     </div>
    </div>
    <div class="text-center mt-4">
     <p>
      © 2023 Travlia. All rights reserved.
     </p>
    </div>
   </section>


  <script crossorigin="anonymous" integrity="sha384-oBqDVmMz4fnFO9gybBogGzA2QpHl6lKp4Y9TV6D8r9j7sk/8y+Rt1w5nVS5gI5iQ" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
  </script>
  <script crossorigin="anonymous" integrity="sha384-pprn3073KE6tl6/7mW1sB8KQ1pvvclb4O2E3zU3k6A9E6z5p4U5p75jFf0e4p5F5" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
  </script>

 </body>
</html>
